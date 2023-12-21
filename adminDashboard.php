<?php
    include 'includes/adminHeader.php';
?>

<br>
<br>

<div class="col-12">
    <main?>
        <div class="container">
            <div class="row mb-4">
                <div class="col-1">
                </div>
                <div class="col-4">
                    <h3>Monthly Sales</h3>
                    <div class="graph-container">
                        <svg width="100%" height="100%">
                            <!-- X-axis -->
                            <line x1="0" y1="280" x2="400" y2="280" class="axis"></line>

                            <!-- Y-axis -->
                            <line x1="40" y1="0" x2="40" y2="280" class="axis"></line>

                            <!-- Data points -->
                            <circle cx="40" cy="240" r="5" class="data-point"></circle>
                            <circle cx="120" cy="180" r="5" class="data-point"></circle>
                            <circle cx="200" cy="100" r="5" class="data-point"></circle>
                            <circle cx="280" cy="220" r="5" class="data-point"></circle>

                            <!-- Connecting lines -->
                            <polyline points="40,240 120,180 200,100 280,220" class="line"></polyline>

                            <!-- Month labels -->
                            <text x="40" y="295" class="axis">Jan</text>
                            <text x="120" y="295" class="axis">Feb</text>
                            <text x="200" y="295" class="axis">Mar</text>
                            <text x="280" y="295" class="axis">Apr</text>
                        </svg>
                    </div>
                </div>

                <div class="col-1">
                </div>
                <div class="col-4">
                    <h3>Profits</h3>
                    <div class="graph-container">
                        <div class="bar" style="height: 150px;">
                            <div class="label">Jan</div>
                        </div>
                        <div class="bar" style="height: 120px;">
                            <div class="label">Feb</div>
                        </div>
                        <div class="bar" style="height: 200px;">
                            <div class="label">Mar</div>
                        </div>
                        <div class="bar" style="height: 80px;">
                            <div class="label">Apr</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
    include 'includes/adminFooter.php';
?>
