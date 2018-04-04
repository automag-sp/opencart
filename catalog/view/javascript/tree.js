function AnimatedList(aID, aTagName, aClassName,
                      aParam1, aParam2, aMode) {
    if (!arguments.callee.apply) {
        return false;
    }
    this.handlersList = [];
    this.dependentLists = [];
    this.listID = aID;
    this.openerTag = aTagName;
    this.className = aClassName;
    this.openingMode = aMode;
    this.openersPreparator(aParam1, aParam2);
    if (!this.itemsProto.isSet) {
        this.itemsProto.call(this.itemsConstructor.prototype,
                             this.contexAdaptor);
    }
    this.progectLoader(this.contexAdaptor
                           .call(this.listInitializer, this));
}

/**
 * The prototype of the AnimatedList.
 * Contains all necessary properties and methods.
 */

AnimatedList.prototype = {
    
/**
 * This function pre-loads images. 
 * @alias openersPreparator
 * @param {String} aParam1 The address to the image representing 
 * the opened list, or corresponding text symbol.
 * @param {String} aParam2 The address to the image representing 
 * the closed list, or corresponding text symbol.
 */
       
    openersPreparator: function (aParam1, aParam2) {
        if (this.openerTag === 'img') {
            (new Image).src = aParam1;
            (new Image).src = aParam2;
        }
        this.openedVal = aParam1;
        this.closedVal = aParam2;
    },
    
/**
 * This function creates an element <a> in which there will be 
 * an image or a text element. 
 * @alias openersCreator
 * @return {Object} Returns new element <a>.
 */
    
    openersCreator: function (aTag) {
        var shell = document.createElement('a'),
            elem = document.createElement(aTag);
        if (aTag === 'img') {
            elem.setAttribute('src', this.closedVal);
        } else {
            elem.appendChild(
                document.createTextNode(this.closedVal));
        }
        shell.appendChild(elem);
        shell.setAttribute('href', '#');
        return shell;
    },
    
/**
 * This function initializes the main list and all necessary elements.
 * @alias listInitializer
 * @param {String} aList Id of a list or list object.
 * @see #openersCreator
 * @see #itemsConstructor
 * @see #itemsProto#onClickHandler
 * @see #addHandler
 * @see #contexAdaptor
 * @see #handlersRemover
 */
    
    listInitializer: function (aList, aBool) {
        aList = aList || document.getElementById(this.listID);
        if (!aList) {
            return false;
        }
        if (!this.listTag) {
            this.listTag = aList.tagName.toLowerCase();
        }
        var items = aList.getElementsByTagName('li'),
            len = items.length,
            listTag = this.listTag,
            openerTag = this.openerTag,
            className = this.className,
            dependentLists = this.dependentLists,
            currItem,
            childList,
            openerNode,
            newObj;
        while (len--) {
            currItem = items[len];
            if (currItem.parentNode === aList) {
                childList = currItem.getElementsByTagName(listTag)[0];
                if (childList) {
                    this.listInitializer(childList, true);
                    openerNode = this.openersCreator(openerTag);
                    childList.className = className;
                    currItem.insertBefore(openerNode, childList);
                    newObj = new this.itemsConstructor(this, childList,
                                 openerNode, dependentLists.length);
                    dependentLists[dependentLists.length] = newObj;
                    this.addHandler(openerNode, 'click',
                               newObj.onClickHandler
                                     .adapt(newObj, true));
                }
            }
        }
        if (!aBool && this.handlersList.length) {
            this.addHandler(window, 'unload',
                            this.contexAdaptor
                                .call(this.handlersRemover, this));
        }
    },
    
/**
 * This function establishes DOMContentLoaded event handler and 
 * its imitations.
 * @alias progectLoader
 * @param {Function} aCallBack Function to call when 
 * the document is ready.
 */
    
    progectLoader: function (aCallBack) {
        if (!document.getElementById && !document.createElement) {
            return false;
        }
        var script,
            strIE = '<script defer src="//:" id="scriptForIE' 
                     + this.listID + '"><\/script>',
            opera9 = window.opera && window.opera.version
                && parseInt(window.opera.version()) >= 9;
        if (document.addEventListener && !window.opera || opera9) {
            document.addEventListener('DOMContentLoaded',
                                      aCallBack, false);
        } else if (/WebKit|Khtml/i.test(navigator.userAgent)
               || window.opera && !opera9 && document.readyState) {
            return (function () {
                (/loaded|complete/.test(document.readyState))
                ? aCallBack()
                : setTimeout(arguments.callee, 100); 
            })();
        } 
        if (/MSIE/i.test(navigator.userAgent)) {
            document.write(strIE);
            script = document.getElementById('scriptForIE' 
                                             + this.listID);
            if (!script) {
                return false;
            }
            script.onreadystatechange = function () {
                if (this.readyState === 'complete') {
                    aCallBack();
                    script = null;
                }
            }
        }
    },
    
/**
 * This function calls methods of registration event handlers. 
 * @alias addHandler
 * @param {Object} aObj Target of event.
 * @param {String} aEvent Type of event.
 * @param {Function} aFunc Event handler.
 */
    
    addHandler: function (aObj, aEvent, aFunc) {
        if (aObj.addEventListener) {
            aObj.addEventListener(aEvent, aFunc, false);
        } else if (aObj.attachEvent) {
            try {
                var b = aObj.attachEvent('on' + aEvent, aFunc);
                if (b) {
                    this.handlersList.push(arguments);
                }
            } catch (aEx) {}
        }
    },
    
/**
 * This function deletes event handlers (for IE only). 
 * @alias removeHandler
 * @param {Object} aObj Target of event.
 * @param {String} aEvent Type of event.
 * @param {Function} aFunc Event handler.
 */
    
    removeHandler: function (aObj, aEvent, aFunc) {
        aObj.detachEvent('on' + aEvent, aFunc);
    },
    
/**
 * This function finds all event handlers, transferring them 
 * to removeHandler when unload event fires (for IE only).
 * @alias handlersRemover
 * @see #removeHandler
 */
    
    handlersRemover: function () {
        var list = this.handlersList,
            len = list.length;
        while (len--) {
            this.removeHandler.apply(this, list[len]);
        }
    },
    
/**
 * Creates a new instance of itemsConstructor.
 * @classDescription This constructor creates the necessary 
 * quantity of instances depending on quantity of additional lists.
 * @alias itemsConstructor
 * @param {Object} aList List object.
 * @param {Object} aOpener Element <a>, which will be some "opener" 
 * for hidden list (named openerNode).
 * @param {Object} aEngine Pointer to instance of AnimatedList.
 * @param {Number} aID Identifier for the enclosed list.
 * @see #itemsInitializer
 * @constructor
 * @return {itemsConstructor}Returns a new itemsConstructor.
 * @type {Object}
 */
    
    itemsConstructor: function (aEngine, aList, aOpener, aID) {
        this.listItems = [];
        this.openerNode = aOpener;
        this.openedVal = aEngine.openedVal;
        this.closedVal = aEngine.closedVal;
        this.openingMode = aEngine.openingMode;
        this.listIndex = 0;
        this.indexIncrement = 1;
        this.itemsInitializer(aList, aEngine, aID);
    },
    
/**
 * Will give all own properties and methods to ptototype of 
 * itemsConstructor.
 * @alias itemsProto
 * @param {Function} aFunc Extention for some methods.
 */
    
    itemsProto: function (aFunc) {
        
/**
 * Allows to make only one call.
 * @alias isSet
 * @type {Boolean}
 */
        
        arguments.callee.isSet = true;
        
/**
 * Time difference between occurrence of items of the list.
 * @alias intervalDelay
 * @type {Number}
 */
        
        this.intervalDelay = 100;
        
/**
 * Initializes items of the hideen list.
 * @alias itemsInitializer
 * @param {Object} aList Hidden list.
 * @param {Object} aEngine Pointer to instance of AnimatedList.
 * @param {Number} aID Index of hidden list in array named 
 * dependentLists.
 */       
        
        this.itemsInitializer = function (aList, aEngine, aID) {
            var currItem,
                listItems = this.listItems,
                listTag = aEngine.listTag,
                items = aList.getElementsByTagName('li'),
                len = items.length;
            while (len--) {
                currItem = items[len];
                if (currItem.parentNode === aList) {
                    listItems.push(currItem);
                } 
                if (currItem.getElementsByTagName(listTag)[0]) {
                    this.childList = aEngine.dependentLists[aID - 1];
                }
            }
            if (this.openingMode) {
                listItems.reverse();
            }
        };
        
/**
 * Handler of click event on an element which has been created by 
 * a script and named openerNode.
 * @alias onClickHandler
 * @param {Object} aEvent Event Object.
 * @param {Boolean} aBool Specifies a recursive call.
 * @see #sequenceBreaker
 * @see #openerChanger
 * @return {Boolean} Returns result of one of methods of 
 * cancelling default event behaviour.
 */
        
        this.onClickHandler = function (aEvent, aBool) {
            var child = this.childList;
            if (this.timerID) {
                this.sequenceBreaker(this.indexIncrement);
                this.listIndex += this.indexIncrement;
            } else if (child && this.indexIncrement < 0) {
                child.onClickHandler(null, true);
            } else if (aBool) {
                this.indexIncrement = -1;
            }
            this.openerChanger(this.indexIncrement);
            return (aEvent) 
                   ? (aEvent.preventDefault)
                     ? aEvent.preventDefault()
                     : aEvent.returnValue = false
                   : false;
        };
        
/**
 * This function ges a following element of the list for show/hide.
 * It sets the timer for a recursive call.
 * @alias sequenceMaker
 * @param {Number} aInc Increment/decrement of list index.
 * @param {Function} aFunc Function for a recursive call (it's 
 * arguments.callee itself).
 * @see #visibilityChanger
 * @see #sequenceBreaker
 */
        
        this.sequenceMaker = function (aInc, aFunc) {
            var items = this.listItems,
                index = this.listIndex;
            this.visibilityChanger(items[index], aInc);
            if (items[index + aInc]) {
                this.listIndex += aInc;
                this.timerID = window.setTimeout(
                                   aFunc.adapt(this, false,
                                               aInc, aFunc),
                                   this.intervalDelay);
            } else {
                this.sequenceBreaker(aInc);
            }
        };
        
/**
 * This function cancels the timer and changes an increment/decrement 
 * to opposite value.
 * @alias sequenceBreaker
 * @param {Number} aInc Increment/decrement of list index.
 */
        
        this.sequenceBreaker = function (aInc) {
            window.clearTimeout(this.timerID);
            this.indexIncrement = -aInc;
            this.timerID = false;
        };
        
/**
 * This function changes contents of the element named openerNode.
 * @alias openerChanger
 * @param {Number} aInc Increment/decrement of list index.
 * @see #sequenceMaker
 */
        
        this.openerChanger = function (aInc) {
            var attr,
                el = this.openerNode.firstChild;
            if (el.tagName.toLowerCase() === 'img') {
                attr = 'src';
            } else {
                attr = 'nodeValue';
                el = el.firstChild;
            }
            el[attr] = (aInc > 0)
                       ? this.openedVal
                       : this.closedVal;
            this.sequenceMaker(aInc, this.sequenceMaker);
        };
        
/**
 * This function shows/hides a single element of the list.
 * @alias visibilityChanger
 * @param {Object} aObj An item of the hidden list.
 * @param {Number} aInc Increment/decrement of list index.
 */
        
        this.visibilityChanger = function (aObj, aInc) {
            aObj.style.display = (aInc > 0)
                                 ? 'block' : 'none';
        };
        
/**
 * Creation of necessary extensions.
 */
        
        this.sequenceMaker.adapt
            = this.onClickHandler.adapt = aFunc;
    },
    
/**
 * This function, using closure, helps to keep the necessary context.
 * @alias contexAdaptor
 * @param {Object} aContext Context for function call.
 * @param {Boolean} aBool If true - it extends parameters list.
 * @return {Function} Function to call.
 */
    
    contexAdaptor: function (aContext, aBool) {
        var caller = this,
            arr = Array.prototype,
            args = arr.slice.call(arguments, 2);
        return function () {
            caller.apply(aContext,
                         aBool ? arr.slice.call(arguments)
                                    .concat(args)
                               : args);
        }
    }
}