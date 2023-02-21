<script setup lang="ts">
import { ref, reactive } from "vue";
import { useRoute } from "vue-router";
import ResultBox from "@/components/ResultBox.vue";
import { useAsyncState } from "@vueuse/core";
import { getResultByDay } from "@/services/result.js";

const route = useRoute();

const { state: results, isReady } = useAsyncState(getResultByDay(route.params.day), {});
</script>

<template>
  <section class="w-full">
    <div class="container mx-auto my-4 shadow-lg">
      <div class="w-full px-4 py-6 text-secondary">
        <div
          class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3"
          v-if="isReady"
        >
          <ResultBox
            v-for="result in results['data']"
            :key="result['id']"
            :result="result"
          />
        </div>
      </div>
    </div>
  </section>
</template>
