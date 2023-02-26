<script setup lang="ts">
import { ref, reactive, onMounted, computed } from "vue";
import LiveResultBox from "@/components/LiveResultBox.vue";
import { useAsyncState } from "@vueuse/core";
import { getLivedrawResult } from "@/services/livedraw.js";
import dayjs from "dayjs";
import Number from "@/components/Number.vue";
import { LoopingRhombusesSpinner } from "epic-spinners";

const { state, isReady, execute } = useAsyncState(() => {
  return getLivedrawResult();
}, {});

const result = computed(() => state.value);

onMounted(() => {
  setInterval(async () => {
    execute(0);
  }, 10000);
});
</script>

<template>
  <div class="flex flex-wrap w-full mb-8 gap-x-6 gap-y-6">
    <div class="w-full md:w-[25rem] lg:w-1/3 flex-shrink-0">
      <h3 class="w-full px-4 py-4 mb-2 text-xl font-semibold text-center">
        Result Every Day At 16:45 / 18.45 / 21.45 / 00.45 PM (GMT+8)
      </h3>

      <div class="w-full">
        <div class="overflow-hidden rounded-lg bg-secondary">
          <div
            class="flex items-center justify-between w-full px-3 py-3 bg-primary gap-x-4"
          >
            <div>
              <img
                src="/images/luzon_logo.png"
                alt="luzonpools"
                class="h-5 xl:h-7"
              />
            </div>

            <div class="flex-1 text-sm text-right text-white">
              {{ dayjs(result["date"]).format("dddd, DD MMMM YYYY HH:mm") }}
              (GMT+8)<br />
              Draw No: {{ result["periode"] }}
            </div>
          </div>

          <div class="w-full px-3 py-5">
            <div class="w-full mb-6">
              <div
                class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
              >
                <div
                  class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary"
                >
                  PRIZE 1
                </div>

                <div class="flex items-center justify-center w-1/3 px-2 py-2">
                  <Number :number="result['grandPrize']" />
                </div>
              </div>

              <div
                class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
              >
                <div
                  class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary"
                >
                  PRIZE 2
                </div>

                <div class="flex items-center justify-center w-1/3 px-2 py-2">
                  <Number :number="result['secondPrize']" />
                </div>
              </div>

              <div
                class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
              >
                <div
                  class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary"
                >
                  PRIZE 3
                </div>

                <div class="flex items-center justify-center w-1/3 px-2 py-2">
                  <Number :number="result['thirdPrize']" />
                </div>
              </div>
            </div>

            <div class="w-full mb-6 text-center">
              <div
                class="w-full px-2 py-2 mb-2 font-semibold text-white rounded-md bg-primary"
              >
                Starter Prize
              </div>

              <div
                class="w-full grid grid-cols-3 gap-2 font-semibold [&>div]:py-2 [&>div]:px-2 [&>div]:bg-white [&>div]:rounded-sm"
                v-if="isReady"
              >
                <div
                  v-for="(starter, i) in result['starter']"
                  :key="i"
                  class="flex items-center justify-center"
                >
                  <Number :number="starter" />
                </div>
              </div>

              <div
                v-else
                class="w-full grid grid-cols-3 gap-2 font-semibold [&>div]:py-2 [&>div]:px-2 [&>div]:bg-white [&>div]:rounded-sm"
              >
                <div
                  v-for="i in 6"
                  :key="i"
                  class="flex items-center justify-center"
                >
                  <Number :number="null" />
                </div>
              </div>
            </div>

            <div class="w-full text-center">
              <div
                class="w-full px-2 py-2 mb-2 font-semibold text-white rounded-md bg-primary"
              >
                Consolation Prize
              </div>

              <div
                class="w-full grid grid-cols-3 gap-2 font-semibold [&>div]:py-2 [&>div]:px-2 [&>div]:bg-white [&>div]:rounded-sm"
                v-if="isReady"
              >
                <div
                  v-for="(consolation, i) in result['consolation']"
                  :key="i"
                  class="flex items-center justify-center"
                >
                  <Number :number="consolation" />
                </div>
              </div>

              <div
                v-else
                class="w-full grid grid-cols-3 gap-2 font-semibold [&>div]:py-2 [&>div]:px-2 [&>div]:bg-white [&>div]:rounded-sm"
              >
                <div
                  v-for="i in 6"
                  :key="i"
                  class="flex items-center justify-center"
                >
                  <Number :number="null" />
                </div>
              </div>
            </div>
          </div>
        </div>
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
