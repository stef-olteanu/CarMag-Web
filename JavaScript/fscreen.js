body, html {font-family: "Lato", sans-serif;
            height: 100%;
            margin: 0;
      }

.banner
{
  background-image: url("../Images/banner.jpg");
  min-height: 380px;

  width: 100%;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.centerImg{
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: -10;
}

.container {
  width: 100%;
  position: sticky;
  top:0;

}

.topnav {
  overflow: hidden;
  background-color: transparent;
}


.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 15px 16px;
  text-decoration: none;
  font-size: 20px;
  position: relative;
}

.topnav a:after {
  content: '';
  position: absolute;
  width: 0; height: 3px;
  display: block;
  margin-top: 5px;
  right: 0;
  background: #fff;
  transition: width .5s ease;
  -webkit-transition: width .5s ease;
}

.topnav a:hover:after{
  width: 57%;
  left: 20%;
  background: #fff;
}

.topnav a.active:after {
  width: 57%;
  left: 20%;
  background: #fff;
}


.welcomeEffect{
  position: absolute;
  top: 90%;
  left: 33%;
  margin-right: -50%;

  position: absolute;
  font-family: sans-serif;
  text-transform: uppercase;
  font-size: 2em;
  letter-spacing: 4px;
  overflow: hidden;
  background: linear-gradient(90deg, #000, #fff, #000);
  background-repeat: no-repeat;
  background-size: 80%;
  animation: animate 3s linear infinite;
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(255, 255, 255, 0);
}

@keyframes animate {
  0% {
    background-position: -500%;
  }
  100% {
    background-position: 500%;
  }
}

#goup{
  position: fixed;
  bottom: 5;
  margin-left: 1490;
}
