<script setup lang="ts">
import dayjs from "dayjs";

const props = defineProps({
  result: {
    type: Object,
  },
});

const starterPrize = props.result.starter.split(",");
const consolationPrize = props.result.consolation.split(",");
</script>

<template>
  <div class="overflow-hidden rounded-lg bg-secondary">
    <div
      class="flex items-center justify-between w-full px-3 py-3 bg-primary gap-x-4"
    >
      <div>
        <img src="/images/luzon_logo.png" alt="luzonpools" class="h-5 xl:h-7" />
      </div>

      <div class="flex-1 text-sm text-right text-white">
        {{ dayjs(result.created_at).format("dddd, DD MMMM YYYY HH:mm") }}
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

          <div class="w-1/3 px-2 py-2">{{ result.first }}</div>
        </div>

        <div
          class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
        >
          <div class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary">
            PRIZE 2
          </div>

          <div class="w-1/3 px-2 py-2">{{ result.second }}</div>
        </div>

        <div
          class="flex justify-between w-full mb-3 overflow-hidden font-semibold text-center bg-white rounded-md last:mb-0"
        >
          <div class="flex-1 flex-shrink-0 px-2 py-2 text-white bg-primary">
            PRIZE 3
          </div>

          <div class="w-1/3 px-2 py-2">{{ result.third }}</div>
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
          <div v-for="(starter, i) in starterPrize" :key="i">
            {{ starter }}
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
          <div v-for="(consolation, i) in consolationPrize" :key="i">
            {{ consolation }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
