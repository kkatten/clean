<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="margin: 0; padding: 0; overflow-x: hidden;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Документ') — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .document-backdrop { background: rgba(0,0,0,.35); backdrop-filter: blur(4px); min-height: 100vh; padding: 2rem 1rem; box-sizing: border-box; }
        .document-modal { max-width: 720px; margin: 0 auto; background: #fff; border-radius: 12px; box-shadow: 0 25px 50px -12px rgba(0,0,0,.25); overflow: hidden; display: flex; flex-direction: column; max-height: calc(100vh - 4rem); }
        .document-header { display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.5rem; border-bottom: 1px solid #e5e7eb; flex-shrink: 0; }
        .document-title { font-weight: 700; font-size: 1.125rem; color: #111827; margin: 0; font-family: system-ui, -apple-system, sans-serif; }
        .document-close { display: inline-flex; align-items: center; justify-content: center; width: 2rem; height: 2rem; border: none; background: #f3f4f6; color: #374151; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 1.25rem; line-height: 1; transition: background .2s; }
        .document-close:hover { background: #e5e7eb; color: #111827; }
        .document-body { padding: 1.5rem 2rem 2rem; overflow-y: auto; flex: 1; font-family: system-ui, -apple-system, sans-serif; color: #374151; font-size: 1rem; line-height: 1.6; }
        .document-body h1 { font-size: 1.5rem; font-weight: 700; color: #111827; margin: 0 0 1.25rem; }
        .document-body h2 { font-size: 1.125rem; font-weight: 700; color: #111827; margin: 1.25rem 0 0.5rem; }
        .document-body h3 { font-size: 1rem; font-weight: 700; color: #111827; margin: 1rem 0 0.35rem; }
        .document-body p { margin: 0 0 0.75rem; }
        .document-body ul { margin: 0 0 0.75rem; padding-left: 1.5rem; }
        .document-body a { color: #2563eb; text-decoration: underline; }
        .document-body a:hover { color: #1d4ed8; }
    </style>
</head>
<body style="margin: 0; padding: 0; overflow-x: hidden;">
    <div class="document-backdrop">
        <div class="document-modal">
            <div class="document-header">
                <h1 class="document-title">Документ</h1>
                <a href="{{ url()->previous('/') }}" class="document-close" aria-label="Закрыть">×</a>
            </div>
            <div class="document-body">
                @yield('document_content')
            </div>
        </div>
    </div>
</body>
</html>
