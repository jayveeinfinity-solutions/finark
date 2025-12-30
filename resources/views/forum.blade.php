<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="{{ config('r2.endpoint') }}/images/brands/logo.png">

        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            "primary": "#1034A7",
                            "primary-light": "#eef2ff",
                            "background": "#f8f9fa",
                            "card": "#ffffff",
                            "border-light": "#e5e7eb",
                            "text-main": "#111827",
                            "text-muted": "#6b7280"
                        },
                        fontFamily: {
                            "display": ["Manrope", "Noto Sans", "sans-serif"]
                        },
                        borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                    },
                },
            }
        </script>
        @routes
        @vite(['resources/js/app.js'])
        @inertiaHead
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            ::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }
            ::-webkit-scrollbar-track {
                background: #f1f1f1; 
            }
            ::-webkit-scrollbar-thumb {
                background: #d1d5db; 
                border-radius: 3px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #9ca3af; 
            }
            a {
                text-decoration: none !important;
            }
            p {
                margin: 0 !important;
            }
        </style>
    </head>
    @inertia
</html>