<?php session_start();?>
<?php 
    $deleted_notifications= array();
    $_SESSION['deleted_notifications']= $deleted_notifications;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="3; URL='OptionsPage.php'"/>
  <title> Praking Finder </title>
  <link rel='stylesheet' href="Fpage.css">
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <style>
    html,
    body {
        margin: 0;
        padding: 0;
        font-family: "Noto Sans", sans-serif;
    }
    .hero {
        display: grid;
        position: relative;
        grid-template-columns: 100vw;
        grid-template-rows: 100vh;
        place-items: center;
        overflow: hidden;
        animation: clip-hero-anim 1.25s cubic-bezier(0.29, 0.8, 0.8, 0.98);
        will-change: clip-path;
    }
    .hero__bg, .hero__cnt {
        align-self: center;
        grid-column: 1/2;
        grid-row: 1/2;
    }
    .hero__bg {
        display: grid;
        position: relative;
        z-index: 0;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        place-items: center;
        animation: fade-in 0.75s linear;
        will-change: opacity;
    }
    .hero__bg::before {
        content: "";
        display: block;
        position: absolute;
        z-index: 5;
        top: -10%;
        right: -10%;
        bottom: -10%;
        left: -10%;
        background: #4C2C72(41, 4, 47, 0.4);
        background-blend-mode: screen;
    }
    .hero__bg picture {
        display: flex;
        height: 100vh;
        width: 100vw;
        animation: scaling-hero-anim 4s 0.25s cubic-bezier(0, 0.71, 0.4, 0.97) forwards;
        will-change: transform;
    }
    .hero__bg img {
        display: block;
        object-fit: cover;
        object-position: 77% 50%;
        height: auto;
        width: 100%;
    }
    .hero__cnt {
        display: grid;
        position: relative;
        place-items: center;
        z-index: 10;
        color:  #FFF;
        font-size: 2.5vw;
        text-transform: uppercase;
        opacity: 0;
        animation: fade-in 0.75s 1.5s linear forwards;
    }
    .hero__cnt svg {
        height: 12vw;
    }
    .hero__cnt svg path {
        fill:  #FFF;
    }
    .hero__cnt h1 {
        margin-bottom: 0;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @keyframes scaling-hero-anim {
        from {
            transform: scale(1.25);
        }
        to {
            transform: scale(1.1);
        }
    }
    @keyframes clip-hero-anim {
        from {
            clip-path: polygon(50% 50%, 50% 50%, 50% 50%, 50% 50%);
        }
        to {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
        }
    }
  </style>
</head>
<body>
  <div class="hero">
    <div class="hero__bg">
      <picture>
        <img src="https://i.imgur.com/hdWhXaK.png"> 
      </picture>
    </div>
    <div class="hero__cnt">
        <img src="https://i.imgur.com/uKkGOpm.png" alt="">
    <path d="M201.76,17.01C174.45,6.79,145.3,1.07,115.13,0c-1.35-.04-2.66,.46-3.63,1.39-.97,.94-1.52,2.23-1.52,3.58V73.57c0,2.75,2.23,4.98,4.98,4.98h78.8c2.3,0,4.3-1.57,4.84-3.8,4.25-17.46,6.4-35.31,6.4-53.07,0-2.08-1.29-3.94-3.24-4.67Z"/><path d="M93.51,1.4c-.97-.94-2.29-1.44-3.63-1.39C59.7,1.07,30.55,6.79,3.24,17.01c-1.95,.73-3.24,2.59-3.24,4.67,0,17.77,2.16,35.63,6.42,53.08,.54,2.23,2.54,3.8,4.84,3.8H90.06c2.75,0,4.98-2.23,4.98-4.98V4.98c0-1.35-.55-2.65-1.52-3.58Z"/><path d="M90.06,93.5H17.1c-1.61,0-3.12,.78-4.05,2.09-.93,1.31-1.18,2.99-.66,4.51,11.56,33.67,30.73,64.99,56.97,93.07l17.06,18.25c.96,1.03,2.29,1.58,3.64,1.58,.61,0,1.23-.11,1.83-.35,1.9-.75,3.15-2.59,3.15-4.63V98.48c0-2.75-2.23-4.98-4.98-4.98Z"/><path d="M191.95,95.58c-.93-1.31-2.44-2.09-4.05-2.09H114.96c-2.75,0-4.98,2.23-4.98,4.98v109.53c0,2.05,1.25,3.88,3.15,4.63,.59,.23,1.21,.35,1.83,.35,1.35,0,2.68-.55,3.64-1.58l17.05-18.25c26.23-28.08,45.4-59.39,56.96-93.07,.52-1.52,.28-3.2-.66-4.51Z"/></svg>
      <h1>Parking Finder</h1>
    </div>
  </div>
</body>
</html>
