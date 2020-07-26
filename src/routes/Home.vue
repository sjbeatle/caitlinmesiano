<template>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-lg-5">
      <section class="sec-simple">
        <svg viewBox="0 0 250 25" style="width: 100%">
          <text x="0" y="20">Singer/Actor/Voiceover Artist</text>
        </svg>
      </section>
      <section class="sec-simple">
        <h2 class="sec-simple__title cm-title">About</h2>
        <div v-html="about" class="sec-simple__content"></div>
      </section>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'home',
  data() {
    return {
      about: '',
    };
  },

  created() {
    axios.get('./static/content.json').then((response) => {
      this.about = response.data.about;
    });
  },
};
</script>

<style lang='scss'>
.sec-simple {
  background-color: rgba(255, 255, 255, 0.8);
  @include border-radius(0.6rem);
  @include box-shadow(0px 0px 15px 0px rgba(85, 200, 217, 1));
  padding: 1em;
  margin-top: 4rem;

  &:first-of-type {
    margin-top: 0;
  }

  &__title {
    font-family: 'Fredericka the Great';
    text-transform: uppercase;
    text-align: center;
    color: $heading;
    line-height: 1;
    width: calc(100% - 1rem);
    margin: 0 auto 2rem auto;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid $hr;
  }
}

.latest {
  @include flexbox();
  margin-top: 4rem;

  &:first-of-type {
    margin-top: 0;
  }

  &__date {
    @include flex(0 0 auto);
    width: 60px;
    height: 60px;
    background: $accent-blue;
    border-radius: 2px;
    margin: 0.6rem 1rem 0 0;
    padding: 0.5rem;
    color: #fff;
    text-align: center;

    &__month,
    &__day {
      display: block;
      font-weight: bold;
      line-height: 1;
    }

    &__month {
      text-transform: uppercase;
      border-bottom: 1px solid rgba(255, 255, 255, 0.5);
      margin-bottom: 0.2rem;
      padding-bottom: 0.5rem;
      font-size: 1.6rem;
    }

    &__day {
      font-size: 2.5rem;
    }
  }

  &__copy {
    @include flex(1 1 auto);
    font-size: 1.6rem;
  }
}

@media (min-width: $width-md-min) {
  .latest {
    &__copy {
      font-size: inherit;
    }
  }
}

@media (min-width: $width-lg-min) {
  .sec-simple {
    &__title {
      font-size: 2em;
    }
  }
}
</style>
