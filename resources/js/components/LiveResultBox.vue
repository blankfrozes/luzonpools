<script setup lang="ts">
import dayjs from "dayjs";
import Number from "@/components/Number.vue";

const props = defineProps({
  result: {
    type: Object,
  },
});
</script>

<template>
  <div class="bg-secondary">
    <div
      class="flex items-center justify-between w-full px-3 py-3 bg-primary gap-x-4"
    >
      <div>
        <img src="/images/luzon_logo.png" alt="luzonpools" class="h-5 xl:h-7" />
      </div>

      <div class="flex-1 text-sm text-right text-white">
        {{ dayjs(result.date).format("dddd, DD MMMM YYYY HH:mm") }}
        (GMT+8)<br />
        Draw No: {{ result.periode }}
      </div>
    </div>

    <div class="w-full px-3 py-5">
      <div class="w-full mb-6">
        <div
          class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
        >
          <div class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary">
            PRIZE 1
          </div>

          <div class="flex items-center justify-center w-1/3 px-2 py-2">
            <div v-for="(first, i) in result.grandPrize" :key="i">
              <Number :number="first" />
            </div>
          </div>
        </div>

        <div
          class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
        >
          <div class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary">
            PRIZE 2
          </div>

          <div class="flex items-center justify-center w-1/3 px-2 py-2">
            <div v-for="(second, i) in result.secondPrize" :key="i">
              <Number :number="second" />
            </div>
          </div>
        </div>

        <div
          class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
        >
          <div class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary">
            PRIZE 3
          </div>

          <div class="flex items-center justify-center w-1/3 px-2 py-2">
            <div v-for="(third, i) in result.thirdPrize" :key="i">
              <Number :number="third" />
            </div>
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
        >
          <div
            v-for="(starter, i) in result.starter"
            :key="i"
            class="flex items-center justify-center"
          >
            <div v-for="(result, i) in starter" :key="i">
              <Number :number="result" />
            </div>
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
        >
          <div
            v-for="(consolation, i) in result.consolation"
            :key="i"
            class="flex items-center justify-center"
          >
            <div v-for="(result, i) in consolation" :key="i">
              <Number :number="result" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
