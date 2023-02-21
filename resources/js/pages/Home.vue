<script setup lang="ts">
import LiveResult from "@/components/Home/LiveResult.vue";
import AllDayResult from "@/components/Home/AllDayResult.vue";
import TextContent from "@/components/Home/TextContent.vue";
</script>

<template>
  <section class="w-full">
    <div class="mx-auto my-4 shadow-lg lg:container">
      <div class="w-full px-4 py-6 text-secondary">
        <LiveResult />
        <AllDayResult />
        <TextContent />
      </div>
    </div>
  </section>
</template>
