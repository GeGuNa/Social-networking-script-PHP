





function loadScript(sURL, onLoad) {
  var loadScriptHandler = function() {
    var rs = this.readyState;
    if (rs === 'loaded' || rs === 'complete') {
      this.onreadystatechange = null;
      this.onload = null;
      window.setTimeout(onLoad, 20);
    }
  };
  function scriptOnload() {
    this.onreadystatechange = null;
    this.onload = null;
    window.setTimeout(onLoad, 20);
  }
  var oS = document.createElement('script');
  oS.type = 'text/javascript';
  if (onLoad) {
    oS.onreadystatechange = loadScriptHandler;
    oS.onload = scriptOnload;
  }
  oS.src = sURL;
  document.getElementsByTagName('head')[0].appendChild(oS);
}


function getLiveData() {
  loadScript('aba.js');
}


    function isUndef (v) {
        return v === undefined || v === null
    }

    function isDef (v) {
        return v !== undefined && v !== null
    }

    function isTrue (v) {
        return v === true
    }

    function isFalse (v) {
        return v === false
    }
    
    
        function isPrimitive (value) {
        return (
            typeof value === 'string' ||
            typeof value === 'number' ||
            // $flow-disable-line
            typeof value === 'symbol' ||
            typeof value === 'boolean'
        )
    }
    
    
    function isObject (obj) {
        return obj !== null && typeof obj === 'object'
    }


    function toNumber (val) {
        var n = parseFloat(val);
        return isNaN(n) ? val : n
    }


let audioplayer = function () {
    var musicFilesId = [],
        volume = 100,
        duration = 0,
        durationEstimate = 0,
        loadLine = 0,
        playlist =
            {
                playing_id: null,
                state: 'stop',
                last_play_id: null,
                progress: true,
            },
        audio = {
            stop: function (t) {
                var n = $("#audio" + t);
                $("#audio" + t + " .ai_dur").text('');
                n.removeClass("ai_playing ai_current");
                playlist.progress = true;
                playlist.state = 'stop';
                playlist.last_play_id = null;
                soundManager.stop(t);
            }, timeFormat: function (a) {
                a = Math.round(a);
                var c = Math.floor(a / 3600), b = a % 3600;
                a = Math.floor(b / 60);
                b = Math.ceil(b % 60);
                0 != c && (c += ":");
                return c + (0 != c && 10 > a ? "0" + a : a) + ":" + (10 > b ? "0" + b : b)
            }

        };


    return {
        playPause: function (e, t, a) {
            if ("i_download" == e.target.className)
                return !1;
            cancelEvent(e);
            var n = $("#audio" + t);
            if (playlist.state == 'play' && playlist.playing_id == t) {
                n.removeClass("ai_playing");
                playlist.state = 'pause';
                soundManager.pause(t);
                return true;
            }
            if (playlist.last_play_id != null && playlist.last_play_id != t) {
                playlist.progress = true;
                audio.stop(playlist.playing_id);
            }
            if (!n.hasClass("ai_playing"))
                n.addClass("ai_playing ai_current");
            else
                n.removeClass("ai_playing");
            if (playlist.state == 'pause' && playlist.playing_id == t) {
                playlist.playing_id = t;
                playlist.last_play_id = t;
                playlist.state = 'play';
                soundManager.resume(t);
            }
            else {
                playlist.playing_id = t;
                playlist.last_play_id = t;
                playlist.state = 'play';
                soundManager.createSound({
                    id: t,
                    url: n.attr('data-file'),
                    whileplaying: function () {
                        var thisTime = ((parseInt(this.position)) / 1000).toFixed();
                        $("#audio" + t + " .ai_dur").text(audio.timeFormat(thisTime));
                    },
                    onfinish: function () {
                        audio.stop(t);
                    },
                    volume: volume
                });

                soundManager.play(t);
            }
            return cancelEvent(e), !1
        }
    }
}();
