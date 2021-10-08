<html>
  <head>
    <link rel="shortcut icon" href="/favicon.ico" />
    <style>
      @keyframes myAnim {
        0% {
          transform: translate(0);
        }
        10% {
          transform: translate(-2px, -2px);
        }
        20% {
          transform: translate(2px, -2px);
        }
        30% {
          transform: translate(-2px, 2px);
        }
        40% {
          transform: translate(2px, 2px);
        }
        50% {
          transform: translate(-2px, -2px);
        }
        60% {
          transform: translate(2px, -2px);
        }
        70% {
          transform: translate(-2px, 2px);
        }
        80% {
          transform: translate(-2px, -2px);
        }
        90% {
          transform: translate(2px, -2px);
        }
        100% {
          transform: translate(0);
        }
      }
      * {
        margin: 0;
        overflow: hidden;
      }
      body {
        width: 100vw;
        height: 100vh;
        background: black;
      }
      span {
        display : flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        color: white;
        font-weight: bold;
        font-size: 50px;
        animation: myAnim 5s cubic-bezier(0.12, 0, 0.39, 0) 0s infinite normal backwards;
      }
    </style>
  </head>
  <body>
    <span>
      <i>This user is currently banned.
      </i>
    </span>
  </body>
</html>
