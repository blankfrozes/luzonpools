<script setup lang="ts">
import { useRoute } from "vue-router";
import ResultBox from "@/components/ResultBox.vue";
import { useAsyncState } from "@vueuse/core";
import { getResultById } from "@/services/result.js";

const route = useRoute();

const { state: result, isReady } = useAsyncState(getResultById(route.params.id), {});
</script>

<template>
  <section class="w-full">
    <div class="container mx-auto shadow-lg my-4">
      <div class="w-full px-4 py-6 text-secondary">
        <h1 class="w-full text-3xl mb-8 font-semibold text-center">
          Result : {{ result["periode"] }}
        </h1>

        <div class="w-full flex justify-center">
          <div class="w-full max-w-lg">
            <ResultBox :result="result" v-if="isReady" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
