II<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {
    
    include "../Controller/Admin/System.php";  
    // get Certificates
    $student_count = getstudentsCount();
    $Instructor_count = getInstructorCount();
    $Course_count = getCourseCount();
    
    # Header 
    $title = "EduPulse - System Analysis ";
    include "inc/Header.php";
?>
<style>
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin: 2rem 0;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 25px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: transform 0.3s ease;
        color: white;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        background: linear-gradient(45deg, #fff, #3498db);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .stat-label {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .chart-container {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 20px;
        margin: 20px 0;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .chart-title {
        color: white;
        font-size: 1.2rem;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    canvas {
        max-width: 100%;
        margin: 10px auto;
    }

    .recent-activity {
        background: rgba(255, 255, 255, 0.05);
        padding: 15px;
        border-radius: 10px;
        margin: 10px 0;
        border-left: 3px solid #3498db;
        color: white;
        transition: all 0.3s ease;
    }

    .recent-activity:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);
    }
</style>

<div class="container">
    <?php include "inc/NavBar.php"; ?>
    
    <div class="p-5 shadow">
        <h4 class="mb-4">System Analysis Dashboard</h4>
        
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-value" data-count="<?=$student_count?>"><?=$student_count?></div>
                <div class="stat-label">Total Students</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" data-count="<?=$Instructor_count?>"><?=$Instructor_count?></div>
                <div class="stat-label">Total Instructors</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" data-count="<?=$Course_count?>"><?=$Course_count?></div>
                <div class="stat-label">Total Courses</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="chart-container">
                    <h5 class="chart-title">Traffic Analysis</h5>
                    <div id="visitedStudentsChart"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-container">
                    <h5 class="chart-title">Course Enrollment Statistics</h5>
                    <div id="enrollmentChart"></div>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <h5 class="chart-title">Recent Activities</h5>
            <div class="recent-activity">10 new students joined this week</div>
            <div class="recent-activity">5 new courses were created</div>
            <div class="recent-activity">Quiz completion rates increased by 15%</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    // Traffic Analysis Chart
    var trafficOptions = {
        series: [{
            name: 'Visited Students',
            data: [20, 30, 25, 15, 25, 35, 45]
        }],
        chart: {
            type: 'area',
            height: 350,
            foreColor: '#fff',
            toolbar: {
                show: false
            }
        },
        colors: ['#3498db'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        },
        tooltip: {
            theme: 'dark'
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.2,
            }
        }
    };

    // Course Enrollment Chart
    var enrollmentOptions = {
        series: [44, 55, 41, 64, 22],
        chart: {
            type: 'pie',
            height: 350,
            foreColor: '#fff',
            background: 'transparent'
        },
        labels: ['Programming', 'Design', 'Business', 'Marketing', 'Data Science'],
        colors: ['#3498db', '#e74c3c', '#2ecc71', '#f1c40f', '#9b59b6'],
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            labels: {
                colors: '#fff'
            }
        },
        dataLabels: {
            enabled: true,
            style: {
                colors: ['#fff'],
                fontWeight: 'bold'
            },
            background: {
                enabled: false
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(value) {
                    return value + '%'
                }
            }
        }
    };

    var trafficChart = new ApexCharts(document.querySelector("#visitedStudentsChart"), trafficOptions);
    var enrollmentChart = new ApexCharts(document.querySelector("#enrollmentChart"), enrollmentOptions);
    
    trafficChart.render();
    enrollmentChart.render();

    // Add number animation effect
    function animateNumbers() {
        document.querySelectorAll('.stat-value').forEach(element => {
            const target = parseInt(element.dataset.count);
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.ceil(current);
                }
            }, 20);
        });
    }

    // Call animation on page load
    animateNumbers();
</script>
 <!-- Footer -->
<?php include "inc/Footer.php"; ?>


<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>