<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h1>Metric Pages</h1>
        <p>Esta es una aplicación desarrollada en Laravel que permite obtener y guardar métricas de Google PageSpeed Insights para una URL específica. La aplicación permite seleccionar categorías y estrategias para realizar las consultas y almacenar los resultados.</p>
        
<h2>Requisitos</h2>
        <ul>
            <li>PHP >= 8.0</li>
            <li>Composer</li>
            <li>MySQL</li>
            <li>Node.js y npm</li>
        </ul>

<h2>Instalación</h2>
        <p>Sigue los siguientes pasos para descargar y ejecutar la aplicación en tu entorno local.</p>

<h3>1. Clonar el repositorio</h3>
        <pre><code>git clone https://github.com/alanleonelfernandez/metric-pages.git</code></pre>

<h3>2. Instalar dependencias de PHP</h3>
        <pre><code>composer install</code></pre>

<h3>3. Instalar dependencias de Node.js</h3>
        <pre><code>npm install</code></pre>

<h3>4. Configurar el archivo <code>.env</code></h3>
        <p>Copia el archivo <code>.env.example</code> y renómbralo a <code>.env</code>:</p>
        <pre><code>cp .env.example .env</code></pre>
        <p>Configura las variables de entorno en el archivo <code>.env</code>, incluyendo la conexión a la base de datos y otras configuraciones necesarias.</p>

<h3>5. Generar la clave de la aplicación</h3>
        <pre><code>php artisan key:generate</code></pre>

<h3>6. Configurar la base de datos</h3>
        <p>Crea una base de datos en MySQL y asegúrate de que las variables de entorno en <code>.env</code> estén configuradas correctamente.</p>

<h3>7. Migrar la base de datos</h3>
        <pre><code>php artisan migrate</code></pre>

<h3>8. Ejecutar el servidor de desarrollo</h3>
        <pre><code>php artisan serve</code></pre>
        <p>La aplicación estará disponible en <code>http://localhost:8000</code>.</p>

<h2>Uso</h2>
        <ol>
            <li>Accede a la aplicación en tu navegador.</li>
            <li>Ingresa la URL que deseas analizar.</li>
            <li>Selecciona las categorías y la estrategia.</li>
            <li>Haz clic en "Fetch Metrics" para obtener las métricas.</li>
            <li>Guarda los resultados si lo deseas.</li>
            <li>Puedes ver el historial de métricas desde la opción "History Metrics".</li>
        </ol>

</div>
</body>
</html>
