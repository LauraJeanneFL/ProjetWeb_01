<h1>User Profile</h1>
<p>Username: {{ user.username }}</p>
<p>Email: {{ user.email }}</p>

<h2>Bid History</h2>
<ul>
    {% for bid in history %}
        <li>{{ bid.name }} - {{ bid.end_date }}</li>
    {% endfor %}
</ul>
