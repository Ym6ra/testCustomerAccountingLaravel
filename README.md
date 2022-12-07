
<span>Запуск проекта:<span><br>
<ul>
<li>Скачать проект.
<li>В папке проекта открыть терминал и прописать команды:
  <ul>
  <li>docker-compose up -d
  <li>docker exec -it web_app bash
  <li>cp .env.example .env
  <li>composer install --ignore-platform-reqs
  <li>php artisan key:generate
  <li>php artisan migrate:fresh --seed
  </ul>
<li>В браузере открыть ссылку http://localhost:8080/
</ul>
