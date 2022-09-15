<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                History
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-4 sm:px-6 lg:px-8">

                    <div class="mt-8 flex flex-col">
                      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Ticker</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> Open</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> High</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> Low</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> Last</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> Close</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> Date</th>

                                </tr>
                              </thead>
                              <tbody class="bg-white">
                                <tr v-for="(row, rowIdx) in $page.props.tickers" :key="row.email" :class="rowIdx % 2 === 0 ? undefined : 'bg-gray-50'">
                                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ row.ticker }}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.open }}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.high }}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.low }}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.last }}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.close }}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.date }}</td>

                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </AppLayout>
</template>
