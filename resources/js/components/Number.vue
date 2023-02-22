<script setup lang="ts">
import { BreedingRhombusSpinner } from "epic-spinners";

const props = defineProps({
  number: String,
});
</script>

<template>
  <div>
    <div v-if="number">
      {{ number }}
    </div>

    <div v-else class="ml-2">
      <breeding-rhombus-spinner
        :animation-duration="2000"
        :size="12"
        color="#216900"
      />
    </div>
  </div>
</template>
