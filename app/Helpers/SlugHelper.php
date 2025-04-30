<?php

if (!function_exists('generateGuestCode')) {
    function generateGuestCode($name)
    {
        // Buat slug dari nama
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        
        // Hapus karakter '-' berulang
        $slug = preg_replace('/-+/', '-', $slug);
        
        // Ambil 3 karakter pertama dari slug
        $slugPart = substr($slug, 0, 3);
        
        // Generate 4 digit random number
        $randomPart = mt_rand(1000, 9999);
        
        return strtoupper($slugPart) . $randomPart;
    }
}