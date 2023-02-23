<script setup lang="ts">
import { ref, reactive } from "vue";
import LiveResultBox from "@/components/LiveResultBox.vue";
import { useAsyncState } from "@vueuse/core";
import { getLivedrawResult } from "@/services/livedraw.js";

const { state: liveResult, isReady } = useAsyncState(getLivedrawResult(), {});
</script>

<template>
  <div class="flex flex-wrap w-full mb-8 gap-x-6 gap-y-6">
    <div class="w-full md:w-[25rem] lg:w-1/3 flex-shrink-0">
      <h3 class="w-full px-4 py-4 mb-2 text-xl font-semibold text-center">
        Result Every Day At 16:45 / 18.45 / 21.45 / 00.45 PM (GMT+8)
      </h3>

      <div class="w-full" v-if="isReady">
        <LiveResultBox :result="liveResult" />
      </div>
    </div>

    <div class="flex-1 w-full md:w-auto">
      <h3 class="w-full px-4 py-4 mb-2 text-xl font-semibold text-center">
        - Our Partner -
      </h3>

      <div class="flex flex-wrap justify-start w-full gap-y-2">
        <a href="" class="block w-full"
          ><img src="/images/viva.webp" alt="viva" class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img
            src="/images/friday_funda.webp"
            alt="friday_funda"
            class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img src="/images/bonus.webp" alt="bonus" class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img src="/images/win_streak.webp" alt="win_streak" class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img
            src="/images/weekly_rolling.webp"
            alt="weekly_rolling"
            class="w-full"
        /></a>
      </div>
    </div>
  </div>
</template>
