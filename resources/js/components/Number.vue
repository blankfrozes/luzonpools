<script setup lang="ts">
import { LoopingRhombusesSpinner } from "epic-spinners";

const props = defineProps({
  number: String,
});
</script>

<template>
  <div>
    <div v-if="number">
      {{ number }}
    </div>

    <div v-else class="py-1">
      <looping-rhombuses-spinner
        :animation-duration="1000"
        :size="14"
        color="#216900"
      />
    </div>
  </div>
</template>
