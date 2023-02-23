<script setup lang="ts">
import { ref, reactive, computed } from "vue";
import dayjs from "dayjs";
import { useAsyncState } from "@vueuse/core";
import { getAllResults } from "@/services/result.js";

let currentPage = ref(1);
const pagination = reactive({
  first: 0,
  last: 5,
  total: 5,
});

const { state, isReady, execute } = useAsyncState((args) => {
  let current_page = args?.page || 1;

  if (current_page < 1) {
    current_page = 1;
  }

  if (current_page <= 3) {
    pagination.first = 0;
    pagination.last = 5;
    pagination.total = 5;
  } else {
    pagination.first = current_page - 3;
    pagination.last = current_page + 2;
    pagination.total = pagination.last - pagination.first;
  }

  return getAllResults(current_page);
}, {});
const resultLists = computed(() => state.value["data"]);
currentPage = computed(() => state.value["current_page"]);
// const lastPage = computed(() => state.value["last_page"]);
const lastPage = computed({
  get() {
    if (pagination.last > state.value["last_page"]) {
      pagination.last = state.value["last_page"];
      pagination.total = pagination.last - pagination.first;
    }

    return state.value["last_page"];
  },
  set() {},
});
</script>

<template>
  <div class="w-full mb-8 text-secondary">
    <div class="w-full mb-4 text-2xl font-semibold text-center">
      All Day Result
    </div>

    <table
      class="w-full overflow-hidden text-sm font-semibold text-center rounded-md shadow-lg table-fixed [&_td]:border [&_td]:px-2 [&_td]:py-2 [&_th]:px-2 [&_th]:py-2 mb-6"
    >
      <thead class="text-white bg-primary">
        <tr>
          <th class="w-[45%] md:w-[35%]">Date</th>
          <th>Prize 1</th>
          <th>Prize 2</th>
          <th>Prize 3</th>
          <th>View</th>
        </tr>
      </thead>

      <tbody v-if="isReady">
        <tr
          class="even:bg-gray-100 !bg-opacity-60"
          v-for="result in resultLists"
        >
          <td>
            {{ dayjs(result.created_at).format("dddd, DD MMMM YYYY HH:mm") }}
            (GMT+8)
          </td>
          <td>{{ result.first }}</td>
          <td>{{ result.second }}</td>
          <td>{{ result.third }}</td>
          <td>
            <a
              :href="`/detail/${result.id}`"
              class="text-primary hover:text-black"
              >View</a
            >
          </td>
        </tr>
      </tbody>

      <tbody v-else>
        <tr
          class="even:bg-gray-100 !bg-opacity-60 animate-pulse"
          text-center
          v-for="i in 10"
        >
          <td>
            <div class="inline-block w-40 py-2 rounded-sm bg-slate-300"></div>
          </td>
          <td>
            <div class="inline-block py-2 rounded-sm w-14 bg-slate-300"></div>
          </td>
          <td>
            <div class="inline-block py-2 rounded-sm w-14 bg-slate-300"></div>
          </td>
          <td>
            <div class="inline-block py-2 rounded-sm w-14 bg-slate-300"></div>
          </td>
          <td>
            <div class="inline-block py-2 rounded-sm w-14 bg-slate-300"></div>
          </td>
        </tr>
      </tbody>
    </table>

    <div
      class="relative flex flex-wrap items-center justify-center w-full md:justify-between gap-x-4 gap-y-4"
    >
      <div
        class="z-20 flex justify-start text-xs gap-x-2 md:gap-x-4 sm:absolute sm:top-0 sm:left-0 sm:text-sm md:text-base"
      >
        <button
          class="px-4 py-2 bg-gray-100 rounded-full md:py-3 hover:bg-gray-300"
          @click="execute(0, { page: 1 })"
        >
          First Page
        </button>

        <button
          v-if="currentPage > 1"
          class="px-4 py-2 bg-gray-100 rounded-full md:py-3 hover:bg-gray-300"
          @click="execute(0, { page: currentPage - 1 })"
        >
          Previous
        </button>
      </div>

      <div
        class="flex items-center justify-center flex-1 gap-x-2 md:gap-x-3 text-sm md:text-base [&>button]:w-9 md:[&>button]:w-12 [&>button]:px-2 md:[&>button]:px-3 [&>button]:py-2 md:[&>button]:py-3 [&>button]:bg-gray-100 [&>button:hover]:bg-gray-300 [&>button]:rounded-full"
        v-if="isReady"
      >
        <button
          v-for="i in pagination.total"
          :key="i"
          :class="
            currentPage == i + pagination.first ? '!bg-primary text-white' : ''
          "
          @click="execute(0, { page: i + pagination.first })"
        >
          {{ i + pagination.first }}
        </button>
      </div>

      <div
        class="z-20 flex justify-start text-xs gap-x-2 md:gap-x-4 sm:absolute sm:top-0 sm:right-0 sm:text-sm md:text-base"
      >
        <button
          v-if="currentPage < lastPage"
          class="px-4 py-2 bg-gray-100 rounded-full md:py-3 hover:bg-gray-300"
          @click="execute(0, { page: currentPage + 1 })"
        >
          Next Page
        </button>

        <button
          class="px-4 py-2 bg-gray-100 rounded-full md:py-3 hover:bg-gray-300"
          @click="execute(0, { page: lastPage })"
        >
          Last Page
        </button>
      </div>
    </div>
  </div>
</template>
