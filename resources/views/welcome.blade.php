<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión Editorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            background: linear-gradient(rgba(0,0,0,0.55)), url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        h1 {
            font-size: 3.5rem;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 1.5rem;
            animation: slideDown 1s ease-out;
        }
        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }
        .btn-glass {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.25);
            color: #fff;
            padding: 0.6rem 1.4rem;
            margin: 0.3rem;
            border-radius: 30px;
            transition: 0.3s;
        }
        .btn-glass:hover {
            background: rgba(255,255,255,0.3);
            color: #fff;
            transform: translateY(-2px);
        }
        footer {
            position: absolute;
            bottom: 15px;
            width: 100%;
            font-size: 0.85rem;
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div>
        <h1>Sistema de Gestión Editorial</h1>
        <p class="lead mb-4">Gestión de Autores, Libros y Editoriales en un solo lugar</p>

        <a href="{{ route('autores.index') }}" class="btn btn-glass">
            <i class="bi bi-people"></i> Autores
        </a>
        <a href="{{ route('libros.index') }}" class="btn btn-glass">
            <i class="bi bi-book"></i> Libros
        </a>
        <a href="{{ route('editoriales.index') }}" class="btn btn-glass">
            <i class="bi bi-building"></i> Editoriales
        </a>
    </div>

    <footer>
        &copy; {{ date('Y') }} - Proyecto realizado por Scarlet Piguave
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
