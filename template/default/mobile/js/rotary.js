        $(function () {
            window.requestAnimFrame = (function () {
                return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
                function (callback) {
                    window.setTimeout(callback,1000/60)
                }
            })();
            var totalDeg = 360 * 3 + 0;
            var steps = [];
            var lostDeg = [32,92,150,207,266,329];
            var prizeDeg = [0.00001,63,120,177.5,235,295.5];
            var prize, sncode;
            var count = 0;
            var now = 0;
            var a = 0.01;
            var outter, inner, timer, running = false;
            function countSteps() {
                var t = Math.sqrt(2 * totalDeg / a);
                var v = a * t;
                for (var i = 0; i < t; i++) {
                    steps.push((2 * v * i - a * i * i) / 2)
                }
                steps.push(totalDeg)
            }
            function step() {
                outter.style.webkitTransform = 'rotate(' + steps[now++] + 'deg)';
                outter.style.MozTransform = 'rotate(' + steps[now++] + 'deg)';
                if (now < steps.length) {
                    running = true;
                    requestAnimFrame(step)
                } else {
                    running = false;
                    setTimeout(function () {
                        if (prize != null) {
                            $("#sncode").text(sncode);
                            var type = "";
                            if (prize == 1) {
                                type = "一等奖"
                            } else if (prize == 2) {
                                type = "二等奖"
                            } else if (prize == 3) {
                                type = "三等奖"
                            }
                            else if (prize == 4) {
                                type = "一等奖"
                            }
                            else if (prize == 5) {
                                type = "二等奖"
                            }
                            else if (prize == 6) {
                                type = "三等奖"
                            }
							Alertify.dialog.alert(type);
                        } else {
							Alertify.dialog.alert("亲，再接再厉！");
                        }
                    },
                    200)
                }
            }

            function start(deg) {
                deg = deg || lostDeg[parseInt(lostDeg.length * Math.random())];
                running = true;
                clearInterval(timer);
                totalDeg = 360 * 2 + deg;
                steps = [];
                now = 0;
                countSteps();
                requestAnimFrame(step)
            }
            window.start = start;
            outter = document.getElementById('outer');
            inner = document.getElementById('inner');
            i = 10;
            $("#inner").click(function () {
						prize = getRandom(2);
						if(prize>10){
							prize = null;
						}else{
						  prize = getRandom(1);
						}
                        if (prize) {
                            start(prizeDeg[prize - 1])
                        } else {
                            prize = null;
                            start()
                        }
                        running = false;
                        count++;						
            })
        });
