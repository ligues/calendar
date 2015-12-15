var canvas, stage, exportRoot, position, direction, currentframe, minframe, maxframe, limitframe;


function init() {
    canvas = document.getElementById("canvas");
    images = images||{};

    var loader = new createjs.LoadQueue(false);
    loader.addEventListener("fileload", handleFileLoad);
    loader.addEventListener("complete", handleComplete);
    loader.loadManifest(lib.properties.manifest);
}

function handleFileLoad(evt) {
    if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}

function handleComplete(evt) {
    exportRoot = new lib.HOLDAY_canvas_640();
    exportRoot.addEventListener('intro-end', handleIntroEnded);
    exportRoot.addEventListener('intro2-end', handleIntro2Ended);
    exportRoot.addEventListener('end', handleEnd);

    stage = new createjs.Stage(canvas);
    stage.addChild(exportRoot);
    stage.update();
    stage.enableMouseOver();

    createjs.Ticker.setFPS(lib.properties.fps);
    createjs.Ticker.addEventListener("tick", stage);
    createjs.Touch.enable(stage);
}


//function handleComplete(evt) {
//    var queue = evt.target;
//    ss["canvas.assets_atlas_"] = queue.getResult("canvas.assets_atlas_");
//    exportRoot = new lib.HOLDAY_canvas_640();
//    exportRoot.addEventListener('intro-end', handleIntroEnded);
//    exportRoot.addEventListener('intro2-end', handleIntro2Ended);
//    exportRoot.addEventListener('end', handleEnd);
//    stage = new createjs.Stage(canvas);
//    stage.addChild(exportRoot);
//    stage.update();
//    stage.enableMouseOver();
//
//    createjs.Ticker.setFPS(lib.properties.fps);
//    createjs.Ticker.addEventListener("tick", stage);
//    createjs.Touch.enable(stage);
//}


function handleIntroEnded(evt){
    fireEvent('intro-ended');
}

function handleOverlayClosed(){
    //exportRoot.gotoAndPlay("PLAY_OUTRO_OVRLY");
}
var listenerdown, listenermove, listenerup, listenerupdate;
function handleIntro2Ended(evt){
    listenerdown = exportRoot.inv.on('mousedown', handleTouch);
    listenermove = exportRoot.inv.on('pressmove', handleTouch);
    listenerup = exportRoot.inv.on('pressup', handleTouch);
    listenerupdate = exportRoot.on('tick', update);
    minframe = currentframe = 90+48+12;
    maxframe = 107+48+12;
    limitframe = minframe + Math.round(maxframe-minframe>>1);
}

function handleTouch(evt){
    switch(evt.type){
        case 'mousedown':
            position = {x:evt.stageX, y:evt.stageY};
            break;
        case 'pressmove':
            direction = evt.stageY > position.y ? -1 : 1;
            //position.y = evt.stageY;
            break;
        case 'pressup':
            if(currentframe>limitframe){
                disableListeners();
                exportRoot.play();
            }
            break;
    }
}

function disableListeners(){
    exportRoot.inv.off('mousedown', listenerdown);
    exportRoot.inv.off('pressmove', listenermove);
    exportRoot.inv.off('pressup', listenerup);
    exportRoot.off('tick', listenerupdate);
}

function update(){
    currentframe+=direction||0;
    direction=0;
    if(currentframe>maxframe)currentframe=maxframe;
    else if(currentframe<minframe)currentframe=minframe;
    exportRoot.gotoAndStop(currentframe);
}

function handleEnd(){
    disableListeners();
    createjs.Touch.disable(stage);
    fireEvent('drag-ended');
}
function fireEvent(type){
    var event = document.createEvent('Event');
    event.initEvent(type,false,false);
    document.dispatchEvent(event);
}


