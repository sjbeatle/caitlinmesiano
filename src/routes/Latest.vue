<template>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-lg-5">
      <section class="sec-simple">
        <h2 class="sec-simple__title cm-title">Latest</h2>
        <div class="sec-simple__content">
          <div v-bind:key="post.id" v-for="post in posts.slice(0, 2)" class="latest">
            <div class="latest__date">
              <span class="latest__date__month">{{post.month}}</span>
              <span class="latest__date__day">{{post.day}}</span>
            </div>
            <div v-html="post.content" class="latest__copy"></div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>


<script>
import axios from 'axios';

const months = [
  'Jan',
  'Feb',
  'Mar',
  'Apr',
  'May',
  'Jun',
  'Jul',
  'Aug',
  'Sep',
  'Oct',
  'Nov',
  'Dec',
];

export default {
  name: 'latest',
  data() {
    return {
      posts: [],
    };
  },

  created() {
    axios.get('./static/content.json').then((response) => {
      this.posts = response.data.posts.map(post => ({
        id: post.id,
        month: months[new Date(post.date).getMonth()],
        day: new Date(post.date).getDate(),
        content: post.content,
      }));
    });
  },
};
</script>

<style lang='scss'>
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
