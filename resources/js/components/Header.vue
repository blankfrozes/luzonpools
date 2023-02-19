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
    <header class="w-full border-b-[3px] bg-secondary border-primary fixed z-50">
      <div
        class="flex items-center w-full px-4 text-white lg:px-0 lg:container lg:mx-auto gap-x-4"
      >
        <div>
          <a href="/" class="block">
            <img src="images/luzon_logo.png" alt="Luzonpools" class="w-44 xl:w-52" />
          </a>
        </div>

        <div class="items-center flex-1 hidden lg:flex gap-x-6">
          <nav class="flex justify-start flex-1">
            <a href="" :class="navClass">Monday</a>
            <a href="" :class="navClass">Tuesday</a>
            <a href="" :class="navClass">Wednesday</a>
            <a href="" :class="navClass">Thursday</a>
            <a href="" :class="navClass">Friday</a>
            <a href="" :class="navClass">Saturday</a>
            <a href="" :class="navClass">Sunday</a>
          </nav>

          <div class="text-sm">{{ clockText }}</div>
        </div>

        <div class="flex justify-end flex-1 lg:hidden">
          <div class="relative w-8 py-3" @click="toogleNavMobile">
            <img
              src="images/menu.svg"
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
            <a href="" :class="navClass">Monday</a>
            <a href="" :class="navClass">Tuesday</a>
            <a href="" :class="navClass">Wednesday</a>
            <a href="" :class="navClass">Thursday</a>
            <a href="" :class="navClass">Friday</a>
            <a href="" :class="navClass">Saturday</a>
            <a href="" :class="navClass">Sunday</a>
          </nav>

          <div class="px-3 py-4 text-sm xl:px-4">{{ clockText }}</div>
        </div>
      </transition-slide>
    </header>

    <div class="w-full relative">
      <div
        class="w-full bg-center bg-no-repeat bg-cover blur-sm absolute z-10 top-0 left-0 h-full"
        style="background-image: url('images/bg_banner.jpg')"
      ></div>

      <h2
        class="container mx-auto text-3xl tracking-wide text-white relative z-20 text-center font-semibold pt-64 pb-64"
        style="text-shadow: 2px 2px #000"
      >
        Welcome To Luzonpools
      </h2>
    </div>
  </div>
</template>
