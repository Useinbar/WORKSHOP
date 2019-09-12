<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>AHAHHAHA!</title>
  <link rel="stylesheet" href="app.css">
</head>
<body>
  <header>
    <h1>zebi!</h1>
  </header>

  <section class="chat">
    <div class="messages">

    </div>
    <div class="user-inputs">
      <form action="handler.php?task=write" method="POST">
        <input type="text" name="author" id="author" placeholder="Nickname ?">
        <input type="text" id="content" name="content" placeholder="Type in your message right here bro !">
        <button type="submit">🔥 Send !</button>
      </form>
    </div>
  </section>
  <script src="app.js"></script>
</body>
</html>
