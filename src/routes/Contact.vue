<template>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-lg-5">
      <section class="sec-simple">
        <h2 class="sec-simple__title cm-title">Contact Caitlin</h2>
        <div class="sec-simple__content">
          <div v-html="error" class="error-message"></div>
          <div v-html="response" class="response-message"></div>
          <form v-if="response === ''" class="contact-form" v-on:submit.prevent>
            <p>
              <label for="fullname" class="required" v-bind:class="{ error: fullNameError }">Name:</label>
              <input type="text" name="fullname" id="fullname" v-model="fullname" />
            </p>
            <p>
              <label for="email" class="required" v-bind:class="{ error: emailError }">Email:</label>
              <input type="text" name="email" id="email" v-model="email" />
            </p>
            <p>
              <label for="message" class="required" v-bind:class="{ error: messageError }">Message:</label>
              <textarea name="message" id="message" v-model="message"></textarea>
            </p>

            <p>
              <button v-on:click="contactSubmit" :disabled="sending">
                Submit &nbsp;
                <em class="fa fa-arrow-circle-o-right"></em>
              </button>
            </p>

            <input type="text" name="hp" id="hp" ref="honeypot" class="hp" value />
          </form>
          <ul>
            <li>
              <a href="static/media/Mesiano.C.Resume.2019.pdf" target="_blank">
                <span class="fa fa-file-pdf-o"></span> PDF copy of Caitlin's resume
              </a>
            </li>
            <li>
              <a href="static/media/Mesiano.C.EPK_.zip">
                <span class="fa fa-file-archive-o"></span> Caitlin's Electronic Press Kit
              </a>
            </li>
            <li>
              <a href="https://www.linkedin.com/in/caitlin-mesiano-b5a54b108/" target="_blank">
                <span class="fa fa-linkedin-square"></span> LinkedIn
              </a>
            </li>
          </ul>
        </div>
      </section>

      <section class="sec-simple">
        <h2 class="sec-simple__title cm-title">Manager &amp; Agent</h2>
        <div class="sec-simple__content">
          <p>
            <center>For business inquiries, please contact:</center>
          </p>
          <div class="uzan">
            <a href="mailto:Aaron@uiatalent.com">
              <img
                src="../../static/img/UIA Talent Agency Logo.jpg"
                title="Aaron Sanko: Uzan International Artists Manager"
                alt="Aaron Sanko: Uzan International Artists Manager"
                class="img-responsive"
              />
              <br />
              <center>Aaron Sanko</center>
            </a>
          </div>
          <p>
          </p>
        </div>
      </section>

      <section class="sec-simple">
        <h2 class="sec-simple__title cm-title">Friends</h2>
        <div class="sec-simple__content">
          <ul class="friends-list">
            <li v-bind:key="friend.key" v-for="friend in friends" class="friends-list__item">
              <a href="friend.url" target="_blank">{{friend.title}}</a>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
/* eslint-disable no-control-regex */
import axios from 'axios';

export default {
  name: 'contact',
  data() {
    return {
      response: '',
      error: '',
      sending: false,
      fullname: '',
      email: '',
      message: '',
      fullNameError: false,
      emailError: false,
      messageError: false,
      friends: [
        {
          key: 'so',
          url: 'http://www.booksouledout.com',
          title: 'Souled Out (Band)',
        },
        {
          key: 'clp',
          url: 'http://www.corinnelouie.com',
          title: 'Corinne Louie Photography',
        },
        {
          key: 'deo',
          url: 'https://www.doterra.com/US/en/',
          title: 'dōTERRA Essential Oils',
        },
      ],
    };
  },

  methods: {
    contactSubmit() {
      const errorText =
        "Ooops! Something went wrong. Please try again. If the issue persists, please consider contacting Caitlin directly. Phone number and email address can be found in Caitlin's resume, below.<br><br>Thank you! And, sorry for any inconvenience.";
      const fullName = this.fullname;
      const email = this.email;
      const emailValid = this.isValidEmailAddress(email);
      const message = this.message;
      let errorMessage = '';

      if (this.error) {
        this.error = '';
      }

      if (this.honeypot) {
        this.response = errorText;
        return false;
      }

      if (this.sending) {
        return false;
      }

      // disable submit
      this.sending = true;

      // reset errors
      this.fullNameError = false;
      this.emailError = false;
      this.messageError = false;

      if (!fullName || !email || (email && !emailValid) || !message) {
        errorMessage = '<p>Please fix the following errors:</p><ul>';
        if (!fullName) {
          errorMessage += '<li>Name is missing</li>';
          this.fullNameError = true;
        }
        if (!email) {
          errorMessage += '<li>Email is missing</li>';
          this.emailError = true;
        }
        if (!emailValid) {
          errorMessage += '<li>Email is invalid</li>';
          this.emailError = true;
        }
        if (!message) {
          errorMessage += '<li>Message is missing</li>';
          this.messageError = true;
        }
        this.error = `${errorMessage}</ul>`;

        this.sending = false;
      } else {
        axios
          .get('static/inc/contact_AJAX.php', {
            params: {
              email,
              name: fullName,
              message: escape(encodeURIComponent(message)),
            },
            timeout: 5000,
          })
          .then((re) => {
            if (re.data === 1) {
              this.response =
                'Your response has been sent! Thank you so much for contacting Caitlin. You will receive a response as soon as time permits.';
            } else {
              this.response = errorText;
            }
          })
          .catch((er) => {
            this.response = errorText;
            console.error(er); // eslint-disable-line no-console
          })
          .then(() => {
            this.sending = false;
          });
      }

      return false;
    },

    isValidEmailAddress(emailAddress) {
      const pattern = new RegExp(
        /^((([a-z]|\d|[!#$%&'*+\-/=?^_`{|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#$%&'*+\-/=?^_`{|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
      );
      return pattern.test(emailAddress);
    },
  },
};
</script>

<style lang="scss">
.uzan {
  width: 250px;
  margin: 0 auto 30px auto;
}

.hudson-artists {
  width: 400px;
  margin: 0 auto 30px auto;
}

.friends-list {
  list-style: disc;
  margin-left: 25px;
}

.hp {
  position: absolute;
  top: -1000px;
  left: -1000px;
}

.error-message {
  color: #aa0000;
  margin-bottom: 20px;

  &:empty {
    display: none;
  }
}

.response-message {
  margin-bottom: 20px;

  &:empty {
    display: none;
  }
}

.contact-form {
  margin-bottom: 60px;
}

label {
  display: block;
  font-weight: 700;
  text-transform: uppercase;

  &.required:after {
    font-family: fontawesome;
    content: "\f069";
    margin-left: 7px;
    color: #833f4e;
  }

  &.error:after,
  &.error {
    color: #aa0000;
  }
}
</style>
