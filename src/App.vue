<template>
  <div id="app" :style="{ paddingTop: headerHeight + 'px'}">
    <Header
      headerHeight="headerHeight"
      :class="yOffset ? 'scroll' : ''"
    />
    <main class="main container-fluid">
      <router-view></router-view>
    </main>
    <Footer />
  </div>
</template>

<script>
  export default {
    name: 'app',
    data() {
      return {
        headerHeight: 0,
        yOffset: 0,
      };
    },

    mounted() {
      this.$nextTick(() => {
        window.addEventListener('resize', this.getHeaderHeight);
        this.getHeaderHeight();

        window.addEventListener('scroll', this.getYOffset);
        this.getYOffset();
      });
    },

    methods: {
      getHeaderHeight() {
        this.headerHeight = document.querySelector('header').clientHeight;
      },

      getYOffset() {
        this.yOffset = window.pageYOffset > 30;
      },
    },

    beforeDestroy() {
      window.removeEventListener('resize', this.getHeaderHeight);
      window.removeEventListener('scroll', this.getYOffset);
    },
  };
</script>

<style lang="scss">
  #app {
    @include flexbox();
    @include flex-direction(column);
    min-height: 100vh;

    .main {
      @include flex(1 1 auto);
      max-width: 1560px;
      overflow-y: auto;
      width: 100%;
      padding-top: 19rem;
      padding-bottom: 3rem;
      z-index: 5;
    }

    .footer,
    .header {
      @include flex(0 0 auto);
    }
  }

  body,
  html {
    margin: 0;
  }

  html {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    @include box-sizing(border-box);
    font-size: 62.5%;
  }

  *,
  *::before,
  *::after {
    @include box-sizing(inherit);
  }

  body {
    font-family: Lato, Helvetica, Arial, sans-serif;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-smoothing: antialiased;
    font-size: 1.9em;
    line-height: 1.42857143;
    background-color: #5f616f;
    background-image: url(../static/img/body-bkg.jpg);
    background-size: 380px;
    background-repeat: no-repeat;
    background-position: calc(50% - 25px) 0%;
    background-attachment: fixed;
  }

  a {
    color: darken($accent-blue, 20%);
    text-decoration: none;
    @include transition(color);

    &:hover,
    &:active,
    &:focus {
      color: invert($accent-blue);
    }
  }

  p {
    margin-top: 0;
  }

  ul,
  ol {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }

  input[type="text"] {
    border-radius: 5px;
    border: 1px solid #ddd;
    height: 35px;
    padding-left: 5px;
    padding-right: 5px;
    font-size: 0.875em;
  }

  input[type="text"],
  textarea {
    width: 100%;
    max-width: 100%;
  }

  textarea {
    background: #fff;
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 5px;
    font-size: 0.875em;
    min-height: 100px;
  }

  input[type="submit"],
  input[type="reset"],
  input[type="button"],
  .button,
  button {
    min-width: 185px;
    height: 45px;
    display: block;
    text-align: center;
    padding: 3px 10px;
    line-height: 35px;
    background: $accent-blue;
    border: none;
    border-radius: 5px;
    font-size: 1.125em;
    text-transform: uppercase;
    color: #fff;
    transition: all .2s ease;
    -webkit-transition: all .2s ease;
    -moz-transition: all .2s ease;
    -o-transition: all .2s ease;
  }

  button:disabled {
    opacity: .7;
  }

  input[type="submit"]:hover,
  input[type="reset"]:hover,
  input[type="button"]:hover,
  .button:hover,
  button:hover {
    background: darken($accent-blue, 20%);
    transition: all .2s ease;
    -webkit-transition: all .2s ease;
    -moz-transition: all .2s ease;
    -o-transition: all .2s ease;
  }


  @media (min-width: $width-sm-min) {
    input[type="text"] {
      width: 250px;
    }

    textarea {
      width: inherit;
      min-width: 80%;
    }
  }


  @media (min-width: $width-sm-min) {
    body {
      background-size: 100vw;
      background-position: calc(65% + 15vw) 0%;
    }

    #app {
      .main {
        padding-top: 3rem;
      }
    }
  }


  @media (min-width: $width-lg-min) {
    body {
      background-position: calc(65% + 12vw) 0%;
    }
  }


  @media (min-width: 1560px) {
    body {
      background-size: 1560px;
      background-position: calc(50% + 200px) 0%;
    }
  }





  /*------------------------------------*\
    #HELPERS
  \*------------------------------------*/
    .cm-title {
      font-size: 1.5em;
    }

    .uc {
      display: block;
      line-height: 1;
      font-size: 3em;
      text-align: center;
      color: $accent-blue;
    }

    .group::after {
      content: "";
      display: table;
      clear: both;
    }

    @media (min-width: $width-md-min) {
      .cm-title {
        font-size: 2em;
      }
    }
</style>
