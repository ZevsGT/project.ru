<div class="container-fluid b2">
    <h1>Тесты:</h1>
    <ul>
    {% for test in tests %}
        <li><a href="?id={{ test.id }}">{{ test.name }}</a></li>
    {% endfor %}
    </ul>
</div>