(function() {
  // globals
  const DAY_NIGHT_DURATION_IN_SECONDS = 5;
  const CANVAS_BORDER_PIXELS = 7;
  const CANVAS_BORDER_COLOR = 'black';

  // colors
  const sun = { r: 249, g: 215, b: 28 };
  const moon = { r: 244, g: 241, b: 201 };

  const sunrise1 = {r: 32, g: 70, b: 106}; // this is the sky
  const sunrise2 = {r: 120, g: 166, b: 232 };
  const sunrise3 = {r: 194, g: 195, b: 199};
  const sunrise4 = {r: 221, g:178, b: 133};
  const sunrise5 = {r: 255, g: 92, b: 61}; // this is the ground

  const sunset1 = {r:12, g:18, b:44}; // this is the sky
  const sunset2 = {r: 42, g: 10, b: 86};
  const sunset3 = {r: 83, g: 50,b: 86};
  const sunset4 = {r:157, g:50, b:4};
  const sunset5 = {r:12, g:18, b:44}; // this is the ground

  // coordinates
  const starSpawnCoordinates = [
    367, 143,
    486, 236,
    826, 197,
    491, 505,
    295, 314,
     98, 481,
    214, 731,
    412, 613,
    655, 820,
   1026, 332,
   1100, 150,
    910, 535,
    697, 269,
    732, 451
  ];
  const starLocalCoordinates = [
              -2, 0, 
    -0.436781609, 0.275862069, // g 
            -0.7, 0.7,
    -0.275862069, 0.436781609, // f 
               0, 2,
     0.275862069, 0.436781609, // k 
             0.7, 0.7,
     0.436781609, 0.275862069, // l
               2, 0,
     0.436781609, -0.275862069, // j
             0.7, -0.7,
     0.275862069, -0.436781609, // i 
               0, -2,
    -0.275862069, -0.436781609, // n
            -0.7, -0.7,
    -0.436781609, -0.275862069 // h
  ];
  const baseCanvasDimension = { w: 1280, h: 933 };

  // dom
  const domBody = document.body;
  var domCanvas;
  var canvasContext;
  
  // actual constants
  const TAU = 6.283185307179586;
  const CALLS_PER_SECOND = 33;
  const MILLISECONDS_PER_SECOND = 1000;
  const DELAY_PER_CALL = MILLISECONDS_PER_SECOND / CALLS_PER_SECOND;
  
  window.onload = function() {            
    init();

    console.log(Math.tan(Math.PI / 2));
    
    // this creates "intervals" and executes them repeatedly every amount of ms
    setInterval(updateGradient, DELAY_PER_CALL);
  }

  function init() {
    domCanvas = document.getElementById("main-canvas");
    domCanvas.style.border = `${CANVAS_BORDER_PIXELS}px solid ${CANVAS_BORDER_COLOR}`;
    canvasContext = domCanvas.getContext('2d');

    makeCanvasWholeScreen();
    domBody.onresize = () => makeCanvasWholeScreen();

    document.addEventListener("click", (evt) => {
      console.log({ x: evt.clientX, y: evt.clientY });
    });
  }
  function makeCanvasWholeScreen() {
    domCanvas.width = window.innerWidth - CANVAS_BORDER_PIXELS * 2;
    domCanvas.height = window.innerHeight - CANVAS_BORDER_PIXELS * 2;
  }

  var gradient;
  function updateGradient() {
    var skyA = lerpColor(sunset1, sunrise1, normalizedCos); // higher sky
    var skyB = lerpColor(sunset2, sunrise2,  normalizedCos);
    var skyC = lerpColor(sunset3, sunrise3,  normalizedCos);
    var skyD = lerpColor(sunset4, sunrise4,  normalizedCos);
    var skyE = lerpColor(sunset5, sunrise5,  normalizedCos); // lower ground

    gradient = canvasContext.createLinearGradient(0, 0, domCanvas.width, domCanvas.height);
    gradient.addColorStop(0, `rgba(${skyA.r}, ${skyA.g}, ${skyA.b}, 1)`);
    gradient.addColorStop(0.5, `rgba(${skyB.r}, ${skyB.g}, ${skyB.b}, 1)`);
    gradient.addColorStop(0.8, `rgba(${skyC.r}, ${skyC.g}, ${skyC.b}, 1)`);
    gradient.addColorStop(0.9, `rgba(${skyD.r}, ${skyD.g}, ${skyD.b}, 1)`);
    gradient.addColorStop(1, `rgba(${skyE.r}, ${skyE.g}, ${skyE.b}, 1)`);
    canvasContext.fillStyle = gradient;
    canvasContext.fillRect(0, 0, domCanvas.width, domCanvas.height);

    // sun and moon
    var sunAndMoonColor = lerpColor(moon, sun, normalizedCos);

    gradient = canvasContext.createRadialGradient(0, 0, 290, 0, 0, 300);
    gradient.addColorStop(0, `rgba(${sunAndMoonColor.r}, ${sunAndMoonColor.g}, ${sunAndMoonColor.b}, 1)`);  
    gradient.addColorStop(1, 'rgba(255, 255, 255, 0.1)');
    canvasContext.fillStyle = gradient;
    canvasContext.fillRect(0, 0, domCanvas.width, domCanvas.height);

    // stars
    for (let i = 0; i < starSpawnCoordinates.length - 1; i += 2) {
      drawStar({ x: starSpawnCoordinates[i], y: starSpawnCoordinates[i+1] }, { x: inverseCos, y: inverseCos });
    }
    
    animateCosineWave(DAY_NIGHT_DURATION_IN_SECONDS);
  }

  

  // linear interpolation
  var interpolation = 0; 
  function interpolate() {
    interpolation += 1 / (CALLS_PER_SECOND * halfAPeriodDuration);
    if (interpolation > 1) {
      interpolation = 0;
    }
  }

  // cosine wave interpolation 
  var angle = 0;
  var normalizedCos = 0;
  var inverseCos = 1;
  // var timeStart; // debug
  function animateCosineWave(halfAPeriodDuration = 5) {
    const periodDuration = halfAPeriodDuration * 2;
    if (angle >= TAU) {
      angle = 0;
      // console.log(`should be around ${DAY_NIGHT_DURATION_IN_SECONDS * 2} seconds w/o script suspension: ${(Date.now() - timeStart) / 1000} s`); // debug
    }
    if (angle == 0) { timeStart = Date.now(); }
    
    const cos = Math.cos(angle)
    // this is 1 in day, 0 in the night
    normalizedCos = normalizeCosine(cos);
    // this is 1 in night, 0 in the day
    inverseCos = 1 - normalizedCos;
    
    const angleIncrementPerIteration = 1 / (CALLS_PER_SECOND * periodDuration) * TAU;
    angle += angleIncrementPerIteration;
  }
  // that way the cosine wave (1 -> -1 -> 1) is normalized to unitary values  (1 -> 0 -> 1)
  function normalizeCosine(cos) {
    return (1 + cos) * 0.5;
  }

  function lerpColor(colorA, colorB, t) {
    const result = {
      r: lerpValue(colorA.r, colorB.r, t),
      g: lerpValue(colorA.g, colorB.g, t),
      b: lerpValue(colorA.b, colorB.b, t)
    };

    // console.log(`from ${Object.values(colorA)} to ${Object.values(colorB)} -> ${Object.values(result)}`)

    return result
  }

  function lerpValue(a, b, t) {
    const result = a * (1 - t) + b * t;

    // console.log(`from ${a} to ${b}, t = ${t} -> ${result}`);

    return result;
  }

  function getPositionRelativeToScreen(position) {
    const xPercentage = position.x / baseCanvasDimension.w;
    const yPercentage = position.y / baseCanvasDimension.h;
    const xPos = xPercentage * domCanvas.width;
    const yPos = yPercentage * domCanvas.height;
    return { x: xPos, y: yPos }
  }

  
  // draw methods
  function drawStar(position, scale) {
    const drawPosition = getPositionRelativeToScreen(position);
    const LOWEST_RANDOM_INCLUSIVE = 4;
    const INCLUSIVE_RANGE = 2;
    canvasContext.lineWidth = Math.floor(Math.random() * INCLUSIVE_RANGE) + LOWEST_RANDOM_INCLUSIVE;
    canvasContext.strokeStyle = "white";
    canvasContext.fillStyle = "white";
    drawShape(drawPosition.x, drawPosition.y, scale.x, scale.y, starLocalCoordinates);
  }
  function drawShape(x, y, xScale, yScale, coords) {
    const firstCoord = { x: x + (coords[0] * xScale), y: y + (coords[1] * yScale) };
    const scaleMultiplier = (xScale + yScale) / 2;
    canvasContext.lineWidth = canvasContext.lineWidth * scaleMultiplier;
    canvasContext.beginPath();
    canvasContext.moveTo(firstCoord.x, firstCoord.y);

    for (let xIndex = 2; xIndex < coords.length; xIndex += 2) {
      let yIndex = xIndex + 1;
      const nextCoord = { x: x + (coords[xIndex] * xScale), y: y + (coords[yIndex] * yScale) };
      canvasContext.lineTo(nextCoord.x, nextCoord.y);
    }
    canvasContext.closePath();
    canvasContext.stroke();
    canvasContext.fill();
  }
})();