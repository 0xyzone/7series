<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

class BrandKitController extends Controller
{
    public function index()
    {
        $assets = [
            [
                'id' => 'logo-dark-text-svg',
                'name' => 'Primary Brand Wordmark (Light Backgrounds)',
                'category' => 'Vector Logos',
                'format' => 'Vector SVG',
                'resolution' => 'Lossless Vector',
                'filename' => 'seven-series-logo-dark-text.svg',
                'path' => 'brand-assets/seven-series-logo-dark-text.svg',
                'description' => 'Official vector logo with Crimson Red 7 emblem and charcoal typography. Best for white, ivory, and light background stationery, websites, and invoices.',
                'background_class' => 'bg-white border border-zinc-200',
            ],
            [
                'id' => 'logo-white-text-svg',
                'name' => 'Primary Brand Wordmark (Dark Backgrounds)',
                'category' => 'Vector Logos',
                'format' => 'Vector SVG',
                'resolution' => 'Lossless Vector',
                'filename' => 'seven-series-logo-white-text.svg',
                'path' => 'brand-assets/seven-series-logo-white-text.svg',
                'description' => 'Official vector logo with Crimson Red 7 emblem and crisp white typography. Best for indigo denim, sulfur black, and dark apparel tags and packaging.',
                'background_class' => 'bg-zinc-950 border border-zinc-800',
            ],
            [
                'id' => 'emblem-red-svg',
                'name' => 'Seven Series "7" Arch Emblem (Vector)',
                'category' => 'Emblems & Icons',
                'format' => 'Vector SVG',
                'resolution' => 'Lossless Vector',
                'filename' => 'seven-series-emblem.svg',
                'path' => 'brand-assets/seven-series-emblem.svg',
                'description' => 'The standalone geometric 7 arch emblem. Designed for metal rivet engraving, selvedge leather patch embossing, embroidery, and app icons.',
                'background_class' => 'bg-zinc-900 border border-zinc-800',
            ],
            [
                'id' => 'logo-full-png',
                'name' => 'Full Brand Logo (Transparent PNG)',
                'category' => 'Raster PNGs',
                'format' => 'High-Res PNG',
                'resolution' => 'Transparent Raster',
                'filename' => 'seven-series-logo-full.png',
                'path' => 'brand-assets/seven-series-logo-full.png',
                'description' => 'Lossless raster export of the complete brand mark for office documents, presentations, and digital mockups.',
                'background_class' => 'bg-white border border-zinc-200',
            ],
            [
                'id' => 'emblem-png',
                'name' => 'Seven Series "7" Emblem (Transparent PNG)',
                'category' => 'Raster PNGs',
                'format' => 'High-Res PNG',
                'resolution' => 'Transparent Raster',
                'filename' => 'seven-series-emblem.png',
                'path' => 'brand-assets/seven-series-emblem.png',
                'description' => 'High-resolution raster emblem for social media avatars, profile icons, and merchandise tags.',
                'background_class' => 'bg-zinc-900 border border-zinc-800',
            ],
            [
                'id' => 'logo-dark-card',
                'name' => 'Black Canvas Brand Lockup',
                'category' => 'Brand Lockups',
                'format' => 'PNG Artwork',
                'resolution' => 'High-Res Artwork',
                'filename' => 'seven-series-logo-dark-card.png',
                'path' => 'brand-assets/seven-series-logo-dark-card.png',
                'description' => 'Official logo presented on rich obsidian black background for retailer signage and digital displays.',
                'background_class' => 'bg-zinc-950 border border-zinc-800',
            ],
            [
                'id' => 'logo-red-card',
                'name' => 'Crimson Red Brand Lockup',
                'category' => 'Brand Lockups',
                'format' => 'PNG Artwork',
                'resolution' => 'High-Res Artwork',
                'filename' => 'seven-series-logo-red-card.png',
                'path' => 'brand-assets/seven-series-logo-red-card.png',
                'description' => 'Signature Series Crimson background lockup for retail promotional banners and hangtags.',
                'background_class' => 'bg-red-600 border border-red-700',
            ],
            [
                'id' => 'vector-sheet-pdf',
                'name' => 'Master Vector Sheet & Guidelines (PDF)',
                'category' => 'Print Masters',
                'format' => 'Vector PDF',
                'resolution' => 'Press-Ready Vector',
                'filename' => 'seven-series-vector-sheet.pdf',
                'path' => 'brand-assets/seven-series-vector-sheet.pdf',
                'preview_path' => 'brand-assets/seven-series-vector-sheet-preview.svg',
                'description' => 'Original Adobe Illustrator master artwork sheet containing all vector variants and curves for industrial screen printing and tailoring.',
                'background_class' => 'bg-slate-100 border border-slate-300',
            ],
        ];

        $colors = [
            [
                'name' => 'Series Crimson',
                'role' => 'Primary Brand Accent',
                'hex' => '#ED1C24',
                'rgb' => 'rgb(237, 28, 36)',
                'hsl' => 'hsl(358, 85%, 52%)',
                'bg_class' => 'bg-[#ed1c24]',
                'text_class' => 'text-white',
                'description' => 'Official logo red. Used for the 7 arch emblem, selvedge thread ID line, buttons, and brand badges.',
            ],
            [
                'name' => 'Charcoal Typography',
                'role' => 'Primary Wordmark Ink',
                'hex' => '#231F20',
                'rgb' => 'rgb(35, 31, 32)',
                'hsl' => 'hsl(345, 6%, 13%)',
                'bg_class' => 'bg-[#231f20]',
                'text_class' => 'text-white',
                'description' => 'Official vector wordmark tone for "SEVEN SERIES Authentic Denim". Deeper and richer than plain black.',
            ],
            [
                'name' => 'Raw Selvedge Indigo',
                'role' => 'Heritage Denim Blue',
                'hex' => '#0B192C',
                'rgb' => 'rgb(11, 25, 44)',
                'hsl' => 'hsl(215, 60%, 11%)',
                'bg_class' => 'bg-[#0B192C]',
                'text_class' => 'text-white',
                'description' => 'Deep vat-dyed indigo representing authentic 14.5 oz shuttle-loom raw cotton denim.',
            ],
            [
                'name' => 'Pure Cotton Canvas',
                'role' => 'Clean Light Grounds',
                'hex' => '#F8FAFC',
                'rgb' => 'rgb(248, 250, 252)',
                'hsl' => 'hsl(210, 40%, 98%)',
                'bg_class' => 'bg-[#F8FAFC]',
                'text_class' => 'text-zinc-950',
                'description' => 'Natural ring-spun unbleached cotton background for editorial readability and catalog cards.',
            ],
            [
                'name' => 'Cast Hardware Brass',
                'role' => 'Hardware & Metal Rivets',
                'hex' => '#B45309',
                'rgb' => 'rgb(180, 83, 9)',
                'hsl' => 'hsl(26, 90%, 37%)',
                'bg_class' => 'bg-[#B45309]',
                'text_class' => 'text-white',
                'description' => 'Weathered alloy brass for rivets, zipper teeth, and leather patch embossings.',
            ],
        ];

        return view('brandkit', compact('assets', 'colors'));
    }

    public function downloadZip()
    {
        $zipPath = storage_path('app/SevenSeries-BrandKit.zip');

        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            
            $filesToZip = [
                'SevenSeries-Logo-DarkText.svg' => public_path('brand-assets/seven-series-logo-dark-text.svg'),
                'SevenSeries-Logo-WhiteText.svg' => public_path('brand-assets/seven-series-logo-white-text.svg'),
                'SevenSeries-Emblem.svg' => public_path('brand-assets/seven-series-emblem.svg'),
                'SevenSeries-Emblem-Large.svg' => public_path('brand-assets/seven-series-emblem-large.svg'),
                'SevenSeries-Logo-Full.png' => public_path('brand-assets/seven-series-logo-full.png'),
                'SevenSeries-Emblem.png' => public_path('brand-assets/seven-series-emblem.png'),
                'SevenSeries-Emblem-HighRes.png' => public_path('brand-assets/seven-series-emblem-highres.png'),
                'SevenSeries-Logo-DarkCard.png' => public_path('brand-assets/seven-series-logo-dark-card.png'),
                'SevenSeries-Logo-RedCard.png' => public_path('brand-assets/seven-series-logo-red-card.png'),
                'SevenSeries-MasterVectorSheet.pdf' => public_path('brand-assets/seven-series-vector-sheet.pdf'),
                'SevenSeries-SocialPreview-1200x675.jpg' => public_path('images/og-cover.jpg'),
            ];

            foreach ($filesToZip as $nameInZip => $fullPath) {
                if (file_exists($fullPath)) {
                    $zip->addFile($fullPath, 'SevenSeries-BrandAssets/' . $nameInZip);
                }
            }

            $guidelinesText = "========================================================\r\n" .
                "SEVEN SERIES DENIM - OFFICIAL BRAND ASSET GUIDELINES\r\n" .
                "========================================================\r\n\r\n" .
                "Official Email: samparka@7series.com.np\r\n" .
                "Factory: Near Padma Colony Main Entrance, Sitapaila, Kathmandu\r\n" .
                "Website: https://7series.com.np\r\n\r\n" .
                "1. OFFICIAL COLOR PALETTE:\r\n" .
                " - Series Crimson:        #ED1C24 | RGB(237, 28, 36) (Logo Symbol & Red ID Line)\r\n" .
                " - Charcoal Ink:          #231F20 | RGB(35, 31, 32) (Official Vector Typography)\r\n" .
                " - Raw Selvedge Indigo:   #0B192C | RGB(11, 25, 44)\r\n" .
                " - Cotton Canvas:         #F8FAFC | RGB(248, 250, 252)\r\n" .
                " - Hardware Brass:        #B45309 | RGB(180, 83, 9)\r\n\r\n" .
                "2. TYPOGRAPHY:\r\n" .
                " - Primary Font: Outfit (Google Fonts)\r\n" .
                " - Wordmark Typeface: Custom Geometric Heavy Sans (as vectorized in the SVG assets)\r\n" .
                " - Headings: 800 (ExtraBold) & 900 (Black) in uppercase with tight tracking.\r\n" .
                " - Body Text: 400 (Regular) & 500 (Medium) with relaxed line height.\r\n\r\n" .
                "3. ASSET FOLDER CONTENTS:\r\n" .
                " - SevenSeries-Logo-DarkText.svg: For white and light backgrounds\r\n" .
                " - SevenSeries-Logo-WhiteText.svg: For black, dark, and indigo denim grounds\r\n" .
                " - SevenSeries-Emblem.svg: Official '7' arch emblem vector for patches and rivets\r\n" .
                " - SevenSeries-Logo-Full.png: High-resolution lossless raster logo\r\n" .
                " - SevenSeries-Emblem.png: High-resolution emblem raster\r\n" .
                " - SevenSeries-MasterVectorSheet.pdf: Vector curves master sheet\r\n\r\n" .
                "4. CORE BRAND INTEGRITY RULES:\r\n" .
                " - Never stretch, squeeze, or skew the emblem or wordmark.\r\n" .
                " - Never change the official #ED1C24 red to orange or arbitrary colors.\r\n" .
                " - Maintain a minimum breathing margin equal to the height of the emblem.\r\n\r\n" .
                "For press, retail dealership approvals, and vector assistance:\r\n" .
                "Contact: samparka@7series.com.np\r\n";

            $zip->addFromString('SevenSeries-BrandAssets/README-BRAND-GUIDELINES.txt', $guidelinesText);
            $zip->close();
        }

        return response()->download($zipPath, 'SevenSeries-BrandKit.zip', [
            'Content-Type' => 'application/zip',
        ]);
    }
}
