<script setup lang="ts">
import { useRoute } from "vue-router";
import ResultBox from "@/components/ResultBox.vue";

const route = useRoute();
</script>

<template>
  <section class="w-full">
    <div class="container mx-auto shadow-lg my-4">
      <div class="w-full px-4 py-6 text-secondary">
        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
          <ResultBox />
        </div>
      </div>
    </div>
  </section>
</template>
