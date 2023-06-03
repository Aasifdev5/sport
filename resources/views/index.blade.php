@extends('frontend.main')
<script src="{{asset('assets/plugins/jquery/jquery-3.7.0.js')}}"></script>
@section('main-container')
    
<br><br>

<div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div style="background-color:black;color:white;text-align:center"><b>Are you Ready to see the Optimal Lineup For DraftKings?<b></div>
        <div class="card-body" style="height: 110px;">
           
            <form action="" method="get">
                
                 <select class="form-select form-group" id="type" name="team" aria-label="Default select example">
                      <option value="all" selected
                
                >Lineup </option>
               
                <option value="team1"
                <?php
                if(isset($_GET['team']) && $_GET['team']=="team1"){
                  echo "selected";  
                }
                ?>
                >1 lineup</option>
               
              
               
              </select>
              
              <br>
              <div class="center" style=" margin: 0;
                 
              position: absolute;
              top: 85%;
              left: 50%;
              -ms-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);">
              <button type="submit" class="btn btn-primary" style=" width: 300px; margin-bottom: 10px;">Generate</button>
            </form>
           
              </div>

        </div>
        </div>
        </div>
        </div>
    </div>  
    <br>
    <br>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="row">
               
                <div class="col-md-4">
                    <button  class="btn active" data-filter="all" > Players</button>
                </div>
                <div class="col-md-8">
                    <button class="btn" data-filter="all">All</button>
                    <button class="btn" data-filter="pg">PG</button>
                    <button  class="btn" data-filter="sg">SG</button>
                    <button  class="btn" data-filter="sf">SF</button>
                    <button  class="btn" data-filter="pf">PF</button>
                    <button  class="btn" data-filter="c">C</button>
                  </div>
                </div>
           </div>
        </div>
      </div>
    </div>
  </div>
    <br>
    <br>
    
                    @if(isset($_GET['team']) && $_GET['team']=="team1")
                         <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <table  class=" table table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <!--<th>Lock</th>-->
                            <th>Player</th>
                            <th>POS</th>
                            <th>Team</th>
                            <th>OPP</th>
                            <th>SAL</th>
                            <th>FPTS</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                      $player= $latest_match_player;                    
                       // Function to generate lineups
function generateLineups($player)
{
    $lineups = [];
    $playerCount = count($player);

    // Generate four lineups/teams
    for ($i = 1; $i <= 1; $i++) {
        $lineup = [];
        $positions = ['SG', 'PG', 'PF', 'SF','C','F','VC'];

        // Randomly select players for each position
        foreach ($positions as $position) {
            $validPlayers = array_filter($player, function ($player) use ($position, $positions) {
                return $player['pos'] === $position && !in_array($player['name'], $positions);
            });
if(!empty($validPlayers)){
    $randomPlayer = array_rand($validPlayers);
      $lineup[] = $validPlayers[$randomPlayer];
            $positions[] = $validPlayers[$randomPlayer]['name'];
}
            
          
        }
 // Add additional players to reach a total of 8
        $additionalPlayers = array_filter($player, function ($player) use ($positions) {
            return !in_array($player['name'], $positions);
        });

        for ($j = 0; $j < 1; $j++) {
            $randomPlayer = array_rand($additionalPlayers);
            $lineup[] = $additionalPlayers[$randomPlayer];
           
            $positions[] = $additionalPlayers[$randomPlayer]['name'];
            unset($additionalPlayers[$randomPlayer]);
        }
        // Calculate total salary of the lineup
        $totalSalary = array_sum(array_column($lineup, 'sal'));

        // Check if total salary is within $100
        if ($totalSalary <= 100) {
            $lineups[] = $lineup;
        } else {
            $i--;
        }
    }

    return $lineups;
}
 
// Function to display lineups
function displayLineups($lineups)
{
    $latest_match = DB::select("select * from matches_management order by id desc limit 1");
     $team1= array_column($latest_match,'team1','0');
     $team2= array_column($latest_match,'team2','0');
    
    foreach ($lineups as $index => $lineup) {
        // echo "Lineup/Team " . ($index + 1) . "<br>";
         $totalSalary = array_sum(array_column($lineup, 'sal'));
        $totalftps = array_sum(array_column($lineup, 'fpts'));
                
             
        foreach ($lineup as $player) {
           
            ?>
           
            <tr>
              <td><?php echo $player['name']; ?></td>
              <td>{{$player['pos']}}</td>
              <td>{{$player['category']}}</td>
             <td>
                      @if ($player['category'] == $team1['0'] )
                          {{ $team2['0'] }}
                            @else
                        {{  $team1['0'] }}
                        @endif
                   
                </td>
            <td><?php echo $player['sal'] ?></td>
            <td><?php echo $player['fpts'] ?></td>  
            </tr>
            
            
            <?php
        }
        ?>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$totalSalary}}</td>
                <td>{{$totalftps}}</td>
            </tr>
        </tfoot>
        <?php
         $totalSalary. "<br>";
          $totalftps. "<br>";
    }
}

// Usage
$lineups = generateLineups($player);
displayLineups($lineups);
                        ?>
                         </tbody>
                </table>
            </div>
        </div>
    </div>
    
                        @endif
         <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div style="background-color:black;color:white;text-align:center"></div>
            <div class="card-body">
                <table  class="table table-responsive table-stripped" style="width:100%">
                    
                    <thead>
                        <tr>
                            <th>Lock</th>
                            <th>Player</th>
                            <th>POS</th>
                            <th>Team</th>
                            <th>OPP</th>
                            <th>SAL</th>
                            <th>FPTS</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($player as $row)
                
                    <tr>
                          <td><?php if($row['status'] =='1'){ ?>

                        <a href="{{url('status_update',['id'=>$row['id']])}}" ><i class='fas fa-lock' style='font-size:26px;color:red'></i></a>

                      <?php }else{ ?>

                        <a href="status_update/<?php echo $row['id']; ?>" ><i class='fas fa-unlock' style='font-size:26px;color:yellowgreen'></i></a>

                      <?php } ?></td>
                    <td>{{$row['name']}}</td>
                    <td>{{$row['pos']}}</td>
                    <td>{{$row['category']}}</td>
                    <td>
                    @foreach ($match as $singleMatch)
                   
                        @if ($row['category'] == $singleMatch->team1 )
                            {{ $singleMatch->team2 }}
                            @else
                            {{$singleMatch->team1}}
                        @endif
                    @endforeach
                   
                </td>
                    <td contenteditable="true" onblur="updatePlayer(event, 'sal', {{$row['id']}})">{{$row['sal']}}</td>
                    <td contenteditable="true" onblur="updatePlayer(event, 'fpts', {{$row['id']}})">{{$row['fpts']}}</td>
                   
                          </tr>
                           @endforeach
                     </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

      <br>
       <br>
        <br>
    <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div style="background-color:black;color:white;text-align:center"><b>Schedule<b></div>
            <div class="card-body">
                <table id="example1" class="display table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Team</th>
                            <th>Opp</th>
                            <th>Exclude</th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($match as $matches)
                            <tr>
                                <td>{{$matches['time']}}</td>
                                <td>{{$matches['date']}}</td>
                                <td>{{$matches['team1']}}</td>
                                <td>{{$matches['team2']}}</td>
                                <td><button class="btn sm btn-danger exclude-btn" data-team1="{{ $matches['team1'] }}" data-team2="{{ $matches['team2'] }}">Exclude</button></td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                           
                            <th>Time</th>
                            <th>Date</th>
                            <th>Team</th>
                            <th>Opp</th>
                            <th>Exclude</th>
                        </tr>
                    </tfoot>
                </table>
      
            </div>
          </div>
        </div>
      </div>
    <!-- About End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        
        @endsection