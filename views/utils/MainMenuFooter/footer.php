<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <section class="home">
      <div class="description">
        <h1 class="title">
          <span class="gradient-text">Grow Professionally</span> with the Best
        </h1>
        <p class="paragraph">
          In a world filled with opportunities, having a mentor can make all the
          difference. Explore why people turn to this invaluable resource to
          unlock their potential.
        </p>
        <form id="form" autocomplete="off">
          <input
            type="email"
            id="email-id"
            name="email_address"
            aria-label="email adress"
            placeholder=""
            required
            oninput="checkEmpty()" />
          <button type="submit" class="btn" aria-label="submit">
            <span>Subscribe</span>
            <ion-icon name="arrow-forward-outline"></ion-icon>
          </button>
        </form>
      </div>

      <div class="users-color-container">
        <span class="item" style="--i: 1"></span>
        <img
          class="item"
          src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/274f29ce-0d3f-4ac2-a2aa-f9b7bd188b2a"
          style="--i: 2"
          alt="" />
        <span class="item" style="--i: 3"></span>
        <img
          class="item"
          src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/b8a14493-3d9f-4b9b-b93a-56d0bc7243e9"
          style="--i: 4"
          alt="" />

        <img
          class="item"
          src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/03e51e1e-9750-45a5-b75e-a1e341d4562a"
          style="--i: 10"
          alt="" />
        <span class="item" style="--i: 11"></span>
        <img class="item" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/5eb50f89-3e5a-480e-860c-8d40d3ba9ffe" style="--i: 12" alt="" />
        <span class="item" style="--i: 5"></span>

        <span class="item" style="--i: 9"></span>
        <img class="item" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/86c71a79-2efe-4567-8665-b1e5a1fd9735" style="--i: 8" alt="" />
        <span class="item" style="--i: 7"></span>
        <img class="item" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/97ef9643-5202-41aa-80f0-ceeabccdd099" style="--i: 6" alt="" />
      </div>
    </section>

  </body>
<script src="./index.js" defer></script>
</html>