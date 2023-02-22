<script setup lang="ts">
import { ref, reactive } from "vue";
import LiveResultBox from "@/components/LiveResultBox.vue";
import { useAsyncState } from "@vueuse/core";
import { getLivedrawResult } from "@/services/livedraw.js";

const { state: liveResult, isReady } = useAsyncState(getLivedrawResult(), {});

// const liveResult = reactive({
//   id: 1,
//   periode: "2548",
//   grandPrize: ["2", "5", null, null],
//   secondPrize: ["3", "4", "5", "8"],
//   thirdPrize: ["7", "7", "5", "1"],
//   starter: [
//     ["8", "3", "7", "4"],
//     ["1", "2", "8", "1"],
//     ["2", "6", "4", "4"],
//     ["5", "9", "1", "5"],
//     ["4", "3", "0", "4"],
//     ["6", "7", "3", "3"],
//   ],
//   consolation: [
//     ["2", "0", "3", "6"],
//     ["4", "7", "8", "5"],
//     ["2", "0", "0", "2"],
//     ["7", "5", "5", "0"],
//     ["4", "6", "4", "4"],
//     ["2", "6", "9", "4"],
//   ],
//   created_at: "2023-02-22 07:00:00",
// });
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
          ><img src="/images/vip.jpg" alt="vip" class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img
            src="/images/captaincookscasino.gif"
            alt="captaincookscasino"
            class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img src="/images/titan.gif" alt="titan" class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img src="/images/noble.gif" alt="noble" class="w-full"
        /></a>
        <a href="" class="block w-full lg:w-1/2"
          ><img src="/images/virgingames.gif" alt="virgingames" class="w-full"
        /></a>
      </div>
    </div>
  </div>
</template>
