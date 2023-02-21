<script setup lang="ts">
import { useRoute } from "vue-router";
import ResultBox from "@/components/ResultBox.vue";

const route = useRoute();
</script>

<template>
  <section class="w-full">
    <div class="container mx-auto shadow-lg my-4">
      <div class="w-full px-4 py-6 text-secondary">
        <h1 class="w-full text-3xl mb-8 font-semibold text-center">Result : 1234</h1>

        <div class="w-full flex justify-center">
          <div class="w-full max-w-lg">
            <ResultBox />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
