<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Frikly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="text-center pt-2" style="background-color: #e3f2fd; height : 50px; ">
        <h4>{{ $user->name }}'s Dashboard</h4>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-3">
                <label for="selection">Select an option:</label>
                <select class="form-select" id="selection">
                    <option value="chat" selected>Chat</option>
                    <option value="text">Call</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div id="chat">

                    <!-- Chat section content goes here -->
                    <h2 class="mt-3 mb-3">CHATS ANALYSIS</h2>

                    <div class="row mt-4">

                        <h5 class="text-center">This month</h5>
                        <hr>

                        <div class="col">
                            <div class="row">Opening</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Assurance</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Apologies</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Resolution</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Querry</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Closing</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row text-decoration-underline fw-bold">Percentage</div>
                            <div class="row fw-bold ps-4">
                                <span class="fs-4 fw-bold" style="color : rgb(131, 131, 177);">50%</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">

                        @php
                            $weekChatOpening = 0;
                            $weekChatAssurance = 0;
                            $weekChatApologies = 0;
                            $weekChatResolution = 0;
                            $weekChatQuerry = 0;
                            $weekChatClosing = 0;
                            $weekChatTotal = 0;
                            
                            foreach (json_decode($weekChatMarks, true) as $item) {
                                $weekChatOpening += $item['opening'];
                                $weekChatAssurance += $item['assurance'];
                                $weekChatApologies += $item['apologies'];
                                $weekChatResolution += $item['resolution'];
                                $weekChatQuerry += $item['querry'];
                                $weekChatClosing += $item['closing'];
                                $weekChatTotal += $item['total'];
                            }
                            $totalWeekChatEntries = count($weekChatMarks);
                            $weekChatPercentage = 0;
                            if ($totalWeekChatEntries > 0) {
                                $weekChatPercentage = $weekChatTotal / ($totalWeekChatEntries * 60);
                                $weekChatPercentage *= 100;
                            } else {
                                $weekChatPercentage = 0;
                            }
                        @endphp

                        <h5 class="text-center">This Week</h5>
                        <hr>
                        <div class="col">
                            <div class="row">Opening</div>
                            <div class="row fw-bold ps-4">{{ $weekChatOpening }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Assurance</div>
                            <div class="row fw-bold ps-4">{{ $weekChatAssurance }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Apologies</div>
                            <div class="row fw-bold ps-4">{{ $weekChatApologies }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Resolution</div>
                            <div class="row fw-bold ps-4">{{ $weekChatResolution }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Querry</div>
                            <div class="row fw-bold ps-4">{{ $weekChatQuerry }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Closing</div>
                            <div class="row fw-bold ps-4">{{ $weekChatClosing }}</div>
                        </div>
                        <div class="col">
                            <div class="row text-decoration-underline fw-bold">Percentage</div>
                            <div class="row fw-bold ps-4">
                                <span class="fs-4 fw-bold"
                                    style="color : rgb(131, 131, 177);">{{ $weekChatPercentage }}%</span>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-4 mb-2">
                        {{-- calculate todays chat records  --}}
                        @php
                            $todayChatOpening = 0;
                            $todayChatAssurance = 0;
                            $todayChatApologies = 0;
                            $todayChatResolution = 0;
                            $todayChatQuerry = 0;
                            $todayChatClosing = 0;
                            $todayChatTotal = 0;
                            
                            foreach (json_decode($todayChatMarks, true) as $item) {
                                $todayChatOpening += $item['opening'];
                                $todayChatAssurance += $item['assurance'];
                                $todayChatApologies += $item['apologies'];
                                $todayChatResolution += $item['resolution'];
                                $todayChatQuerry += $item['querry'];
                                $todayChatClosing += $item['closing'];
                                $todayChatTotal += $item['total'];
                            }
                            $totalChatEntries = count($todayChatMarks);
                            $todayChatPercentage = 0;
                            if ($totalChatEntries > 0) {
                                $todayChatPercentage = $todayChatTotal / ($totalChatEntries * 60);
                                $todayChatPercentage *= 100;
                            } else {
                                $todayChatPercentage = 0;
                            }
                        @endphp

                        <h5 class="text-center">Today</h5>
                        <hr>
                        <div class="col">
                            <div class="row">Opening</div>
                            <div class="row fw-bold ps-4">{{ $todayChatOpening }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Assurance</div>
                            <div class="row fw-bold ps-4">{{ $todayChatAssurance }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Apologies</div>
                            <div class="row fw-bold ps-4">{{ $todayChatApologies }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Resolution</div>
                            <div class="row fw-bold ps-4">{{ $todayChatResolution }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Querry</div>
                            <div class="row fw-bold ps-4">{{ $todayChatQuerry }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Closing</div>
                            <div class="row fw-bold ps-4">{{ $todayChatClosing }}</div>
                        </div>
                        <div class="col">
                            <div class="row text-decoration-underline fw-bold">Percentage</div>
                            <div class="row fw-bold ps-4">
                                <span class="fs-4 fw-bold"
                                    style="color : rgb(131, 131, 177);">{{ $todayChatPercentage }}%</span>
                            </div>
                        </div>
                        <a href="/form">
                            <button class="mt-5 btn btn-primary w-100">Create a new record</button>
                        </a>
                    </div>
                </div>

                <div id="text" class="d-none">
                    <!-- Text section content goes here -->
                    <h2 class="mt-3 mb-3">CALLS ANALYSIS</h2>

                    <div class="row mt-4">

                        <h5 class="text-center">This month</h5>
                        <hr>

                        <div class="col">
                            <div class="row">Opening</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Assurance</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Apologies</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Resolution</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Querry</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">Closing</div>
                            <div class="row fw-bold ps-4"></div>
                        </div>
                        <div class="col">
                            <div class="row text-decoration-underline fw-bold">Percentage</div>
                            <div class="row fw-bold ps-4">
                                <span class="fs-4 fw-bold" style="color : rgb(131, 131, 177);">50%</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        @php
                            $weekCallOpening = 0;
                            $weekCallAssurance = 0;
                            $weekCallApologies = 0;
                            $weekCallResolution = 0;
                            $weekCallQuerry = 0;
                            $weekCallClosing = 0;
                            $weekCallTotal = 0;
                            
                            foreach (json_decode($weekCallMarks, true) as $item) {
                                $weekCallOpening += $item['opening'];
                                $weekCallAssurance += $item['assurance'];
                                $weekCallApologies += $item['apologies'];
                                $weekCallResolution += $item['resolution'];
                                $weekCallQuerry += $item['querry'];
                                $weekCallClosing += $item['closing'];
                                $weekCallTotal += $item['total'];
                            }
                            $totalWeekCallEntries = count($weekCallMarks);
                            $weekCallPercentage = 0;
                            if ($totalWeekCallEntries > 0) {
                                $weekCallPercentage = $weekCallTotal / ($totalWeekCallEntries * 60);
                                $weekCallPercentage *= 100;
                            } else {
                                $weekCallPercentage = 0;
                            }
                        @endphp
                        <h5 class="text-center">This Week</h5>
                        <hr>
                        <div class="col">
                            <div class="row">Opening</div>
                            <div class="row fw-bold ps-4">{{$weekCallOpening}}</div>
                        </div>
                        <div class="col">
                            <div class="row">Assurance</div>
                            <div class="row fw-bold ps-4">{{$weekCallAssurance}}</div>
                        </div>
                        <div class="col">
                            <div class="row">Apologies</div>
                            <div class="row fw-bold ps-4">{{$weekCallApologies}}</div>
                        </div>
                        <div class="col">
                            <div class="row">Resolution</div>
                            <div class="row fw-bold ps-4">{{$weekCallResolution}}</div>
                        </div>
                        <div class="col">
                            <div class="row">Querry</div>
                            <div class="row fw-bold ps-4">{{$weekCallQuerry}}</div>
                        </div>
                        <div class="col">
                            <div class="row">Closing</div>
                            <div class="row fw-bold ps-4">{{$weekCallClosing}}</div>
                        </div>
                        <div class="col">
                            <div class="row text-decoration-underline fw-bold">Percentage</div>
                            <div class="row fw-bold ps-4">
                                <span class="fs-4 fw-bold" style="color : rgb(131, 131, 177);">{{$weekCallPercentage}}%</span>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-4 mb-2">

                        {{-- Calculating todays call records --}}
                        @php
                            $todayCallOpening = 0;
                            $todayCallAssurance = 0;
                            $todayCallApologies = 0;
                            $todayCallResolution = 0;
                            $todayCallQuerry = 0;
                            $todayCallClosing = 0;
                            $todayCallTotal = 0;
                            
                            foreach (json_decode($todayCallMarks, true) as $item) {
                                $todayCallOpening += $item['opening'];
                                $todayCallAssurance += $item['assurance'];
                                $todayCallApologies += $item['apologies'];
                                $todayCallResolution += $item['resolution'];
                                $todayCallQuerry += $item['querry'];
                                $todayCallClosing += $item['closing'];
                                $todayCallTotal += $item['total'];
                            }
                            $totalCallEntries = count($todayCallMarks);
                            $totalCallPercentage = 0;
                            if ($totalCallEntries > 0) {
                                $todayCallPercentage = $todayCallTotal / ($totalCallEntries * 60);
                                $todayCallPercentage *= 100;
                            } else {
                                $todayCallPercentage = 0;
                            }
                        @endphp

                        <h5 class="text-center">Today</h5>
                        <hr>
                        <div class="col">
                            <div class="row">Opening</div>
                            <div class="row fw-bold ps-4">{{ $todayCallOpening }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Assurance</div>
                            <div class="row fw-bold ps-4">{{ $todayCallAssurance }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Apologies</div>
                            <div class="row fw-bold ps-4">{{ $todayCallApologies }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Resolution</div>
                            <div class="row fw-bold ps-4">{{ $todayCallResolution }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Querry</div>
                            <div class="row fw-bold ps-4">{{ $todayCallQuerry }}</div>
                        </div>
                        <div class="col">
                            <div class="row">Closing</div>
                            <div class="row fw-bold ps-4">{{ $todayCallClosing }}</div>
                        </div>
                        <div class="col">
                            <div class="row text-decoration-underline fw-bold">Percentage</div>
                            <div class="row fw-bold ps-4">
                                <span class="fs-4 fw-bold"
                                    style="color : rgb(131, 131, 177);">{{ $todayCallPercentage }}%</span>
                            </div>
                        </div>
                        <a href="/form">
                            <button class="mt-5 btn btn-primary w-100">Create a new record</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script>
        // Get references to the select element and section divs
        var selection = document.querySelector('#selection');
        var chatSection = document.querySelector('#chat');
        var textSection = document.querySelector('#text');

        // Function to show the selected section and hide the other sections
        function showSection() {
            if (selection.value === 'chat') {
                chatSection.classList.remove('d-none');
                textSection.classList.add('d-none');
            } else if (selection.value === 'text') {
                chatSection.classList.add('d-none');
                textSection.classList.remove('d-none');
            }
        }

        // Call the showSection function when the select element is changed
        selection.addEventListener('change', showSection);

        // Show the chat section by default
        showSection();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>
