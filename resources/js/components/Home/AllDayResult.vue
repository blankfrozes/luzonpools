<script setup lang="ts">
import { ref, reactive } from "vue";
import dayjs from "dayjs";

const resultLists = reactive([
  {
    id: 1,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 2,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 3,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 4,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 5,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 6,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 7,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 8,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 9,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
  {
    id: 10,
    periode: "2548",
    first: "2548",
    second: "3458",
    third: "7751",
    starter: "8374,1281,2644,5915,4304,6733",
    consolation: "2036,4785,2002,7550,4644,2694",
    created_at: "2021-01-01 07:00:00",
  },
]);
</script>

<template>
  <div class="w-full mb-8 text-secondary">
    <div class="w-full mb-4 text-2xl font-semibold text-center">All Day Result</div>

    <table
      class="w-full overflow-hidden text-sm font-semibold text-center rounded-md shadow-lg table-auto [&_td]:border [&_td]:px-2 [&_td]:py-2 [&_th]:px-2 [&_th]:py-2 mb-6"
    >
      <thead class="text-white bg-secondary">
        <tr>
          <th>Date</th>
          <th>Prize 1</th>
          <th>Prize 2</th>
          <th>Prize 3</th>
          <th>View</th>
        </tr>
      </thead>

      <tbody>
        <tr
          class="even:bg-gray-100 !bg-opacity-60"
          v-for="result in resultLists"
          :key="result.id"
        >
          <td>
            {{ dayjs(result.created_at).format("dddd, DD MMMM YYYY HH:mm") }}
            (GMT+8)
          </td>
          <td>{{ result.first }}</td>
          <td>{{ result.second }}</td>
          <td>{{ result.third }}</td>
          <td>
            <a :href="`/detail/${result.id}`" class="text-primary hover:text-black"
              >View</a
            >
          </td>
        </tr>
      </tbody>
    </table>

    <div
      class="flex flex-wrap items-center justify-center w-full md:justify-between gap-x-4 gap-y-4"
    >
      <div class="flex justify-start gap-x-4">
        <button class="px-4 py-3 bg-gray-100 rounded-full hover:bg-gray-300">
          First Page
        </button>

        <button class="px-4 py-3 bg-gray-100 rounded-full hover:bg-gray-300">
          Previous
        </button>
      </div>

      <div
        class="flex items-center justify-center flex-1 gap-x-3 [&>button]:w-12 [&>button]:px-3 [&>button]:py-3 [&>button]:bg-gray-100 [&>button:hover]:bg-gray-300 [&>button]:rounded-full"
      >
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
        <button>5</button>
      </div>

      <div class="flex justify-start gap-x-4">
        <button class="px-4 py-3 bg-gray-100 rounded-full hover:bg-gray-300">
          Next Page
        </button>

        <button class="px-4 py-3 bg-gray-100 rounded-full hover:bg-gray-300">
          Last Page
        </button>
      </div>
    </div>
  </div>
</template>
