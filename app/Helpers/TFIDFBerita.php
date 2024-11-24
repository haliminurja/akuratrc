<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TFIDFBerita
{

    protected static $stopwords = [
        'dan',
        'adalah',
        'ini',
        'di',
        'ke',
        'dari',
        'untuk',
        'pada',
        'dengan',
        'sebagai',
        'oleh',
        'itu',
        'atau',
        'juga',
        'tidak',
        'dalam',
        'saya',
        'kamu',
        'kita',
        'mereka',
        'yang',
        'akan',
        'tersebut',
        'terhadap',
        'tanpa',
        'bagi'
        // Add more stopwords as necessary
    ];

    public static function tokenize($text)
    {
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9\s]/', '', $text);

        $tokens = array_filter(explode(' ', $text), function ($word) {
            return !in_array($word, self::$stopwords);
        });

        return $tokens;
    }

    public static function calculateTF($tokens)
    {
        $totalTokens = count($tokens);
        if ($totalTokens == 0) {
            return [];
        }

        $tf = array_count_values($tokens);
        foreach ($tf as $word => &$count) {
            $count /= $totalTokens;
        }

        return $tf;
    }

    public static function calculateIDF($keyword)
    {
        return Cache::remember("idf_$keyword", 3600, function () use ($keyword) {
            $totalDocuments = DB::table('profil_berita')->count();
            $documentsWithKeyword = DB::table('profil_berita')
                ->where('kata_kunci', 'LIKE', "%{$keyword}%")
                ->orWhere('kata_kunci', 'LIKE', "%{$keyword}%")
                ->count();

            if ($documentsWithKeyword > 0) {
                return log($totalDocuments / $documentsWithKeyword);
            }

            return 0;
        });
    }

    public static function calculateTFIDF($text)
    {
        $tokens = self::tokenize($text);
        $tf = self::calculateTF($tokens);
        $tfidf = [];

        if (empty($tf)) {
            return $tfidf;
        }

        $maxTF = max($tf);

        foreach ($tf as $word => $tfScore) {
            $idfScore = self::calculateIDF($word);
            if ($idfScore > 0) {
                $tfidf[$word] = ($tfScore / $maxTF) * $idfScore;
            }
        }

        return $tfidf;
    }

    public static function saveTFIDFToDB($idBerita, $tfidf)
    {
        if (empty($tfidf)) {
            return;
        }

        DB::transaction(function () use ($idBerita, $tfidf) {
            DB::table('tfidf_berita')->where('id_berita', $idBerita)->delete();

            $insertData = [];
            foreach ($tfidf as $keyword => $score) {
                $insertData[] = [
                    'id_berita' => $idBerita,
                    'keyword' => $keyword,
                    'tfidf_score' => $score
                ];
            }

            if (!empty($insertData)) {
                DB::table('tfidf_berita')->insert($insertData);
            }
        });
    }
}
