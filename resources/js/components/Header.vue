<script setup lang="ts">
import { ref, reactive, onMounted } from "vue";
import dayjs from "dayjs";

const navClass =
  "block uppercase px-3 xl:px-4 py-4 hover:bg-primary font-semibold text-sm xl:text-base";

const clockText = ref();
const showNavMobile = ref(false);

const clock = () => {
  clockText.value = dayjs().format("dddd, DD MMMM YYYY HH:mm:ss");
};

setInterval(clock, 1000);

const toogleNavMobile = () => {
  showNavMobile.value = !showNavMobile.value;
};
const closeNavMobile = () => {
  showNavMobile.value = false;
};

// onMounted(() => {
// });
</script>

<template>
  <div class="w-full">
    <header
      class="w-full border-b-[3px] bg-secondary border-primary fixed z-50"
    >
      <div
        class="flex items-center w-full px-4 text-white lg:px-0 lg:container lg:mx-auto gap-x-4"
      >
        <div>
          <a href="/" class="block">
            <img
              src="/images/luzon_logo.png"
              alt="Luzonpools"
              class="w-44 xl:w-52"
            />
          </a>
        </div>

        <div class="items-center flex-1 hidden lg:flex gap-x-6">
          <nav class="flex justify-start flex-1">
            <a href="/result/monday" :class="navClass">Monday</a>
            <a href="/result/tuesday" :class="navClass">Tuesday</a>
            <a href="/result/wednesday" :class="navClass">Wednesday</a>
            <a href="/result/thursday" :class="navClass">Thursday</a>
            <a href="/result/friday" :class="navClass">Friday</a>
            <a href="/result/saturday" :class="navClass">Saturday</a>
            <a href="/result/sunday" :class="navClass">Sunday</a>
          </nav>

          <div class="text-sm">{{ clockText }}</div>
        </div>

        <div class="flex justify-end flex-1 lg:hidden">
          <div class="relative w-8 py-3" @click="toogleNavMobile">
            <img
              :src="showNavMobile ? '/images/menu_alt.svg' : '/images/menu.svg'"
              alt="nav"
              class="w-full cursor-pointer fill-white"
            />
          </div>
        </div>
      </div>

      <transition-slide>
        <div
          class="w-[100vw] absolute top-[100%] left-0 bg-secondary text-white"
          v-if="showNavMobile"
          v-click-outside="closeNavMobile"
        >
          <nav class="w-full flex flex-col justify-start [*$>a]:">
            <a href="/result/monday" :class="navClass">Monday</a>
            <a href="/result/tuesday" :class="navClass">Tuesday</a>
            <a href="/result/wednesday" :class="navClass">Wednesday</a>
            <a href="/result/thursday" :class="navClass">Thursday</a>
            <a href="/result/friday" :class="navClass">Friday</a>
            <a href="/result/saturday" :class="navClass">Saturday</a>
            <a href="/result/sunday" :class="navClass">Sunday</a>
          </nav>

          <div class="px-3 py-4 text-sm xl:px-4">{{ clockText }}</div>
        </div>
      </transition-slide>
    </header>

    <div class="relative w-full">
      <div
        class="absolute top-0 left-0 z-10 w-full h-full bg-center bg-no-repeat bg-cover blur-sm"
        style="background-image: url('/images/bg_banner.webp')"
      ></div>

      <h2
        class="container relative z-20 pt-64 pb-64 mx-auto text-3xl font-semibold tracking-wide text-center text-white"
        style="text-shadow: 2px 2px #000"
      >
        Welcome To Luzonpools
      </h2>
    </div>
  </div>
</template>
