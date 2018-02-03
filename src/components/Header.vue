<template>
  <header class="header group">
    <div class="header__inner">
      <div class="header__logo">
        <router-link
          class="header__logo__router"
          to="/"
          title="Caitlin Mesiano Home"
          alt="Caitlin Mesiano Home"
        />
      </div>

      <div class="header__title">
        <h1 class="main-title">Caitlin Mesiano</h1>
      </div>

      <div class="header__navigation">
        <MainNav />
      </div>

      <SocialIcons />

      <div
        class="header__mobile"
        @click="toggleMobile"
        :class="{ 'mobile-active': mobileActive }"
      >
        <button
          ref="toggleMobile"
          class="header__mobile__btn fa fa-bars"></button>
        <div class="header__mobile__nav">
          <div class="header__mobile__nav__inner">
            <SocialIcons />
            <MainNav />
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
  export default {
    name: 'header',
    props: [
      'headerHeight',
    ],
    data() {
      return {
        mobileActive: false,
      };
    },

    methods: {
      toggleMobile() {
        const body = document.querySelector('body');
        this.mobileActive = !this.mobileActive;
        body.style.overflow = this.mobileActive ? 'hidden' : '';
      },
    },
  };
</script>

<style lang="scss">
  .header {
    position: fixed;
    width: 100%;
    top: 0;
    margin: 0;
    background-color: rgba(0,0,0,.5);
    @include transition(background-color, 600ms);
    z-index: 15;

    &.scroll {
      background-color: rgba(0,0,0,.85);
    }

    &__inner {
      @include flexbox();
      @include align-items(center);
      max-width: 1560px;
      margin: 0 auto;
      color: #ffffff;
      position: relative;
    }

    &__logo {
      @include flex(0 0 auto);
      background-image: url(../../static/img/logo.png);
      background-size: cover;
      width: 63px;
      height: 50px;

      &__router {
        display: block;
        height: 100%;
        text-decoration: none;
      }
    }

    &__title {
      @include flex(1 0 auto);
      margin-left: 1.6rem;

      .main-title {
        font-family: Oregano;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-size: 2.5rem;
      }
    }

    &__navigation {
      display: none;
    }

    .social-icons {
      display: none;
    }

    &__mobile {
      @include transition(opacity);

      &__btn {
        min-width: auto;
        background: none;
        font-size: 2.5rem;
        padding: 1rem 1.6rem;
        outline: none;

        &:hover {
          background: none;
          opacity: .75;
        }

        .mobile-active &,
        .mobile-active:hover & {
          opacity: 1;
          color: $accent-blue;
        }
      }

      &__nav {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        height: 0;
        overflow: hidden;
        background-color: $accent-blue;
        @include transition(all, 500ms, cubic-bezier(1, 0, 0, 1));

        .mobile-active &,
        .mobile-active:hover & {
          display: block;
          height: calc(100vh - 50px);
          overflow-y: auto;
        }

        &__inner {
          padding: $header-pad;

          .social-icons {
            display: block;
            text-align: center;

            &__item {
              float: none;
              display: inline-block;

              &__link {

                $complement: complement(#54c8d8);

                &:hover,
                &:active,
                &:focus {
                  color: $complement;
                }

                &:focus {
                  outline-color: $complement;
                }
              }
            }
          }


          .nav {
            margin-top: .8rem;

            &__item {
              float: none;
              padding: .8rem 0;

              &__link {
                display: block;
                font-weight: 500;
                padding: $header-pad;
                text-align: center;

                &:hover,
                &:focus {
                  outline: none;
                  background-color: rgba(#ffffff, .2);
                }

                &:active,
                &--selected,
                &--selected:focus,
                &--selected:hover {
                  background-color: rgba(#ffffff, 1);
                  color: $accent-blue;
                }
              }
            }
          }
        }
      }
    }
  }

@media (min-width: $width-sm-min) {
  .header {
    background-color: rgba(0,0,0,.3);

    &__title {
      @include flex(0 0 auto);

      .main-title {
        font-size: 2rem;

        &:after {
          position: absolute;
          content: '';
          padding-left: 1.6rem;
          border-right: 1px solid #c8bfbf;
          width: 0;
          top: $header-pad;
          bottom: $header-pad;
        }
      }
    }

    &__navigation {
      display: block;
      margin-left: 1.6rem;
      padding-left: 1.6rem;
      @include flex(1 0 auto);

      .nav {

        &__item {
          padding: 0 .25rem;

          &__link {
            font-size: 1.6rem;
            padding: .5rem;
          }
        }
      }
    }

    .social-icons {
      display: block;
      font-size: 2rem;
      margin-right: 1.6rem;
      @include flex(0 0 auto);

      &__item {
        margin: 0 .5rem;
      }
    }

    &__mobile {
      display: none;
    }
  }
}

@media (min-width: $width-md-min) {
  .header {

    &__inner {
      padding: 0 $header-pad;
    }

    &__title {

      .main-title {
        font-size: 3.5rem;
      }
    }

    &__logo {
      width: 100px;
      height: 80px;
    }

    &__navigation {
      @include flex(1 0 auto);

      .nav {

        &__item {
          padding: 0 .25rem;

          &__link {
            font-size: inherit;
            padding: .5rem .75rem;
          }
        }
      }
    }

    .social-icons {
      font-size: 2.25rem;
      margin-right: inherit;
    }
  }
}

@media (min-width: $width-lg-min) {
  .header {

    &__title {

      .main-title {
        font-size: 4rem;
      }
    }

    &__navigation {

      .nav {

        &__item {
          padding: 0 ($header-pad / 2);

          &__link {
            padding: ($header-pad / 2) $header-pad;
          }
        }
      }
    }

    .social-icons {
      font-size: 2.5rem;

      &__item {
        margin: 0 .8rem;
      }
    }
  }
}
</style>
