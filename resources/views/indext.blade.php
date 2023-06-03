@extends('frontend.main')

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
                <option value="team2"
                 <?php
                if(isset($_GET['team']) && $_GET['team']=="team2"){
                  echo "selected";  
                }
                ?>
                >2 lineup</option>
              
               
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
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <table id="example" class="display table-responsive" style="width:100%">
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
                 use App\Models\Teams;
                    $team1= array_column($latest_match,'team1','0');
                    $team1  = $team1['0'];
                    $team2= array_column($latest_match,'team2','0');
                    $team2  =  $team2['0'];
                    $latest_match_player = DB::select("select * from teams where actual_team1='".$team1."' and actual_team2='".$team2."'");
                    $latest_match_player= array_column($latest_match_player,'player_name','0');
                    
                      $sum1 = DB::select("select sum(sal) as total from teams where team='team1' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $sum1= array_column($sum1,'total','0');
                      
                      $sum2 = DB::select("select sum(sal) as total from teams where team='team2' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $sum2= array_column($sum2,'total','0');
                      
                      $sum3 = DB::select("select sum(sal) as total from teams where team='team3' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $sum3= array_column($sum3,'total','0');
                      
                      $sum4 = DB::select("select sum(sal) as total from teams where team='team4' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $sum4= array_column($sum4,'total','0');
                      
                      $fpts1 = DB::select("select sum(fpts) as total from teams where team='team1' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $fpts1= array_column($fpts1,'total','0');
                      
                      $fpts2 = DB::select("select sum(fpts) as total from teams where team='team2' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $fpts2= array_column($fpts2,'total','0');
                      
                      $fpts3 = DB::select("select sum(fpts) as total from teams where team='team3' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $fpts3= array_column($fpts3,'total','0');
                      
                      $fpts4 = DB::select("select sum(fpts) as total from teams where team='team4' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                      $fpts4= array_column($fpts4,'total','0');
                      
                    // $collection = Teams::all()->toArray();
                    // $collection= array_column($collection,'player_name','0');
       
               
                    $team_players1 = DB::select("select * from teams where  actual_team1='".$team1."' and actual_team2='".$team2."' and sal<='22' limit 8");
                    $team_players1= array_column($team_players1,'player_name','0');
                     
                    $team1_generate = DB::select("SELECT * FROM teams where  actual_team1='".$team1."' and actual_team2='".$team2."' and sal<='20' limit 8"); 
                    $team1_generate= array_column($team1_generate,'player_name','0');
                    
                       
                    $team1_sum = DB::select("SELECT sum(sal) as sum FROM teams where  actual_team1='".$team1."' and actual_team2='".$team2."'  and sal<='20'   limit 8"); 
                    // echo "<pre>";
                    //   print_r(array_unique($team1_generate));
                    //   echo "</pre>";
                    $team1_sum= array_column($team1_sum,'sum','0');
                   
                    $team1_fpts = DB::select("SELECT sum(fpts) as total FROM teams where  team='team1' and  actual_team1='".$team1."' and actual_team2='".$team2."' and sal<='20' limit 8"); 
                    $team1_fpts= array_column($team1_fpts,'fpts','0');
                         
                    $team_players2 = DB::select("select * from teams where team='team2' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                    $team_players2= array_column($team_players2,'player_name','0');
                       
                    $team_players3 = DB::select("select * from teams where team='team3' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                    $team_players3= array_column($team_players3,'player_name','0');
                         
                    $team_players4 = DB::select("select * from teams where team='team4' and actual_team1='".$team1."' and actual_team2='".$team2."'");
                    $team_players4= array_column($team_players4,'player_name','0');
      // Function to generate lineups
function generateLineups($player)
{
    $lineups = [];
    $playerCount = count($player);

    // Generate four lineups/teams
    for ($i = 1; $i <= 1; $i++) {
        $lineup = [];
        $positions = ['SG', 'PG', 'PF', 'SF','C'];

        // Randomly select players for each position
        foreach ($positions as $position) {
            $validPlayers = array_filter($player, function ($player) use ($position, $positions) {
                return $player['pos'] === $position && !in_array($player['name'], $positions);
            });

            $randomPlayer = array_rand($validPlayers);
            $lineup[] = $validPlayers[$randomPlayer];
            $positions[] = $validPlayers[$randomPlayer]['name'];
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
    foreach ($lineups as $index => $lineup) {
        // echo "Lineup/Team " . ($index + 1) . "<br>";
        //  $totalSalary = array_sum(array_column($lineup, 'sal'));
       
        foreach ($lineup as $player) {
            // echo $player['name'] . "<br>";
            // echo $player['sal'] . "<br>";
            // echo $player['fpts'] . "<br>";
        }
        // echo $totalSalary. "<br>";
    }
}

// Usage
$lineups = generateLineups($player);
displayLineups($lineups);

                
                ?>
                 @if(isset($_GET['team']) && $_GET['team']=="team1")
                
                        @foreach (array_unique($team_players1) as $row)
                     <tr>
                     <td> {{ $row }} </td>
                    <?php
                    $sum=0;
                    $query = DB::select("select * from player_management where name='" .$row . "'");
                    
                    
                    $arr = json_decode(json_encode( $query ), true);
                    $team_player_sal= array_column($arr,'sal','0');
                    $lineup=[];
                //     echo "<pre>";
                //     print_r($arr);
                // echo "</pre>";
                // Calculate total salary of the lineup
        
                    ?>
                    @foreach($query as $row)
                    
                    <td>{{$row->pos}}</td>
                    <td>{{$row->category}}</td>
                    <td>
                        
                    @foreach ($match as $singleMatch)
                   
                        @if ($row->category == $singleMatch->team1 )
                            {{ $singleMatch->team2 }}
                            @else
                            {{$singleMatch->team1}}
                        @endif
                         
                    @endforeach
                </td>
                    <td>{{$row->sal}}</td>
                    <td>{{$row->fpts}}</td>
                   
                    @endforeach
                    
                        </tr>
                             
                            @endforeach
                             <tfoot>
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>{{$fpts1['0']}}</td>
                                  </tr>
                              </tfoot>
                            @endif
                      
                      @if(isset($_GET['team']) && $_GET['team']=="team2")
                
                        @foreach ($team_players2 as $row)
                     <tr>
                        
                    <td> {{ $row }}</td>
                    <?php
                    
               $query = DB::select("select * from player_management where name='" .$row . "'");
              
                    ?>
                    @foreach($query as $row)
                    <?php
                
                    ?>
                    <td>{{$row->pos}}</td>
                    <td>{{$row->category}}</td>
                     <td>
                    @foreach ($match as $singleMatch)
                   
                        @if ($row->category == $singleMatch->team1 )
                            {{ $singleMatch->team2 }}
                            @else
                            {{$singleMatch->team1}}
                        @endif
                    @endforeach
                </td>
                    <td>{{$row->sal}}</td>
                    <td>{{$row->fpts}}</td>
                   
                    @endforeach
                     
                              </tr>
                            @endforeach
                            <tfoot>
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>{{$sum2['0']}}</td>
                                     <td>{{$fpts2['0']}}</td>
                                  </tr>
                              </tfoot>
                            @endif
                      
                      @if(isset($_GET['team']) && $_GET['team']=="team3")
                
                        @foreach ($team_players3 as $row)
                     <tr>
                        
                    <td> {{ $row }} </td>
                    <?php
                    
               $query = DB::select("select * from player_management where name='" .$row . "'");
              
                    ?>
                    @foreach($query as $row)
                    
                    <td>{{$row->pos}}</td>
                     <td>{{$row->category}}</td>
                    <td>
                    @foreach ($match as $singleMatch)
                   
                        @if ($row->category == $singleMatch->team1 )
                            {{ $singleMatch->team2 }}
                            @else
                            {{$singleMatch->team1}}
                        @endif
                    @endforeach
                </td>
                    <td>{{$row->sal}}</td>
                    <td>{{$row->fpts}}</td>
                   
                    @endforeach
                    
                              </tr>
                            @endforeach
                            <tfoot>
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>{{$sum3['0']}}</td>
                                      <td>{{$fpts3['0']}}</td>
                                  </tr>
                              </tfoot>
                            @endif
                      
                      @if(isset($_GET['team']) && $_GET['team']=="team4")
                
                        @foreach ($team_players4 as $row)
                     <tr>
                        
                    <td>    {{ $row }}  </td>
                    <?php
                    
                $query = DB::select("select * from player_management where name='" .$row . "'");
                $arr = json_decode(json_encode ( $query ) , true);
                    ?>
                    @foreach($arr as $row)
                   
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
                    <td>{{$row['sal']}}</td>
                    <td>{{$row['fpts']}}</td>
                   
                    @endforeach
                   
                              </tr>
                              
                            @endforeach
                           <tfoot>
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>{{$sum4['0']}}</td>
                                      <td>{{$fpts4['0']}}</td>
                                  </tr>
                              </tfoot>
                            @endif
                      
                        @if(isset($_GET['team']) && $_GET['team']=="all")
                        
                @foreach (array_unique($latest_match_player) as $posts)
                
                    <tr>
                     
                    <td>{{$posts}}</td>
                    
                    <?php
                    
                  $query = DB::select("select * from player_management where name='" .$posts . "'");
                    
                    ?>
                     @foreach($query as $row)
                    
                    <td>{{$row->pos}}</td>
                    <td>{{$row->category}}</td>
                    <td>
                    @foreach ($match as $singleMatch)
                   
                        @if ($row->category == $singleMatch->team1 )
                            {{ $singleMatch->team2 }}
                            @else
                            {{$singleMatch->team1}}
                        @endif
                    @endforeach
                   
                </td>
                    <td contenteditable="true" onblur="updatePlayer(event, 'sal', {{$row->id}})">{{$row->sal}}</td>
                    <td contenteditable="true" onblur="updatePlayer(event, 'fpts', {{$row->id}})">{{$row->fpts}}</td>
                   
                          </tr>
                             @endforeach
                        @endforeach
                        @endif
                         
                    </tbody>
                   

                </table>
            </div>
        </div>
    </div>


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