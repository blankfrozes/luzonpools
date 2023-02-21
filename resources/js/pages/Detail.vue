<script setup lang="ts">
import { ref, reactive } from "vue";
import { useRoute } from "vue-router";
import ResultBox from "@/components/ResultBox.vue";

const route = useRoute();

const result = reactive({
  id: 1,
  periode: "2548",
  first: "2548",
  second: "3458",
  third: "7751",
  starter: "8374,1281,2644,5915,4304,6733",
  consolation: "2036,4785,2002,7550,4644,2694",
  created_at: "2021-01-01 07:00:00",
});
</script>

<template>
  <section class="w-full">
    <div class="container mx-auto shadow-lg my-4">
      <div class="w-full px-4 py-6 text-secondary">
        <h1 class="w-full text-3xl mb-8 font-semibold text-center">Result : 1234</h1>

        <div class="w-full flex justify-center">
          <div class="w-full max-w-lg">
            <ResultBox :result="result" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
