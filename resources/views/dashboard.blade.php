<x-app-layout>
    @session('success')
        <script>
            successToast("{{ session('success') }}");
        </script>
    @endsession
    <div class="">
        <div class="max-w-7xl">
            <div class="lg:grid lg:grid-cols-3 justify-between gap-5 text-center">
                    <div class="p-6 bg-white w-full rounded-md shadow text-gray-900">
                        <h1>Total Revinue</h1>
                        {{ $revinue }}
                    </div>
                    <div class="p-6 bg-white w-full rounded-md shadow text-gray-900">
                        <h1>Users</h1>
                        {{ $users }}
                    </div>
                    <div class="p-6 bg-white w-full rounded-md shadow text-gray-900">
                        <h1>Clients</h1>
                        {{ $clients }}
                    </div>
                    <div class="p-6 bg-white w-full rounded-md shadow text-gray-900">
                        <h1>Total Projects</h1>
                        {{ $projects }}
                    </div>
                    <div class="p-6 bg-white w-full rounded-md shadow text-gray-900">
                        <h1>Active Projects</h1>
                        {{ $activeProjects }}
                    </div>
                    <div class="p-6 bg-white w-full rounded-md shadow text-gray-900">
                        <h1>Tasks</h1>
                        {{ $tasks }}
                    </div>
            </div>

            <div class="lg:flex mt-5 justify-between text-center lg:space-x-5 lg:space-y-0 space-y-5">
                <div class="bg-white w-full h-[30%] p-6 rounded-md shadow">
                    <h1 class="mb-3">Project Status</h1>
                    <canvas id="myChart" height="200"></canvas>
                </div>
                    
                    <div class="bg-white w-full p-6 rounded-md shadow">
                        <h1>Single Member Projects Status</h1>
                        <div class="relative overflow-x-auto overflow-y-scroll">
                            <table id="myTable" class="w-full grid mt-5 text-sm  rtl:text-left text-gray-500">
                                
                                <thead class="text-xs text-gray-700 bg-gray-100">
                                    <tr class="font-semibold">
                                        <th scope="col" class="px-3 py-3">
                                            Member Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Number of Project
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-grey-light" style="height: 20vh;">
                                    @foreach ($singleUsers as $singleUser)
                                    <tr class="bg-white border-b">
                                        <th scope="row" class="px-6 py-2 text-left w-[50%]">
                                            {{ $singleUser->user->first_name }}
                                        </th>
                                        <td class="px-6 py-2 text-center w-[50%]">
                                            {{ $singleUser->total }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
            </div>

            <div class="bg-white w-[50%] p-6 mt-5 rounded-md shadow">
                <h1>Project Deadline</h1>
                <div class="relative overflow-x-auto overflow-y-scroll">
                    <table id="myTable" class="w-full grid mt-5 text-sm  rtl:text-left text-gray-500 border">
                        
                        <thead class="text-xs text-gray-700 bg-gray-100">
                            <tr class="font-semibold">
                                <th scope="col" class="px-2 py-3 w-[50%] text-left">
                                    Project Title
                                </th>
                                <th scope="col" class="px-5 py-3 w-[50%]">
                                    Project Deadline
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-grey-light" style="height: 20vh;">
                            @foreach ($projectDeadline as $projectDeadlin)
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-2 px-2 text-left w-[50%]">
                                    {{ $projectDeadlin->title }}
                                </th>
                                <td class="py-2 px-3 text-left w-[50%]">
                                    {{ \Carbon\Carbon::parse($projectDeadlin->deadline_at)->diffForHumans() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
            </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const ctx = document.getElementById('myChart');
  
  new Chart(ctx, {
      type: 'bar',
      data: {
          labels: <?php echo json_encode($status); ?>,
          datasets: [{
            label: '# of Votes',
            data: <?php echo json_encode($countStatus); ?>,
            borderWidth: 1
          }]
      },
      options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
      }
  });

</script>