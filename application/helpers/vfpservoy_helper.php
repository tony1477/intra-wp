/* Note: If you want to use the functions below, include them in your globals.js:

1. In the Solution Explorer expand Globals and right-click variables
2. From the popup-menu choose Open in script editor
3. Copy the code below into globals.js

To call them use syntax like this: globals.DATE()   (case-sensitive!)

In Servoy 7.0 a feature will be added to use more than one global file and name them as you wish (like namespaces in .Net). This will allow us to store the functions in a seperate vfp.js and call them like this: vfp.DATE(2011, 3, 31).
 */

// VFP2Servoy Toolkit
// Function : _CLIPTEXT()
// Author   : Omar van Galen
// sumber   : https://www.visualfoxpro.com/vfp2servoy_toolkit.html
/**
* Set or get the contents of the Clipboard
* @param {String} cClipBoardString - string to put on the clipboard
*              if empty the current clipboard contents are returned
*/
function _CLIPTEXT(cClipBoardString){
    if(!cClipBoardString) {
        return application.getClipboardString();
    }else{
        return application.setClipboardContent(cClipBoardString);
    }
}

// VFP2Servoy Toolkit
// Function : ABS()
// Author   : Boudewijn Lutgerink
/**
* Returns the absolute value of the specified numeric expression
*
* @param {Number} nExpression - Specifies the numeric expression whose
*                               absolute value ABS() returns
*/
function ABS(nExpression){
    return Math.abs(nExpression);
}

// VFP2Servoy Toolkit
// Function : ACOS()
// Author   : Boudewijn Lutgerink
/**
* Returns the arc cosine of a specified numeric expression
*
* @param {Number} nExpression - Specifies a numeric expression whose arc cosine
*                               ACOS() returns
*/
function ACOS(nExpression){
    return Math.acos(nExpression);
}

// VFP2Servoy Toolkit
// Function : ADDBS()
// Author   : Boudewijn Lutgerink / Juan Antonio Santana Medina
/**
* Adds a backslash (if needed) to a path expression
*
* @param {String} cPath - Specifies the path name to which to add the backslash
*/
function ADDBS(cPath){
    // testing for a backspace requires the use of two backspaces
    if(utils.stringRight(cPath,1)!="\\"){
        cPath += "\\";
    }
    return cPath;
}

// VFP2Servoy Toolkit
// Function : ADIR()
// Author   : Omar van Galen
/**
* Places information about files/dirs into a JSFile array and returns it
*
* @param {String} cTargetFolder - the path to the folder you want to place in an array
* @param {String} cFileFilter - filter the files/dirs to place in the array
* @param {Number} nFileOption - 1=files, 2=dirs
* @param {Number} nVisibleOption - 1=visible, 2=nonvisible
* @param {Number} nLockedOption - 1=locked, 2=nonlocked
*/
function ADIR(cTargetFolder, cFileFilter, nFileOption, nVisibleOption, nLockedOption){
    if(!cFileFilter) cFileFilter="";
    return plugins.file.getFolderContents(cTargetFolder, cFileFilter, nFileOption,
        nVisibleOption, nLockedOption);
}

// VFP2Servoy Toolkit
// Function : ALLTRIM()
// Author   : Omar van Galen
/**
* Removes all leading and trailing spaces rom the specified string.
*
* @param {String} cString - Specifies a string to remove leading and trailing spaces
*/
function ALLTRIM(cString){
    return utils.stringTrim(cString);
}

// VFP2Servoy Toolkit
// Function : APRINTERS()
// Author   : Omar van Galen
/**
* Returns an array with printernames
*/
function APRINTERS(){
    return application.getPrinters();
}

// VFP2Servoy Toolkit
// Function : ASC()
// Author   : Omar van Galen
/**
* Returns the ANSI value for the leftmost character in a character expression.
*
* @param {String} cExpression - Specifies the character expression containing the
*                               character whose ANSI value ASC() returns.
*/
function ASC(cExpression) {
    return cExpression.charCodeAt(0);
}

// VFP2Servoy Toolkit
// Function : ASIN()
// Author   : Boudewijn Lutgerink
/**
* Returns in radians the arc sine of a numeric expression
*
* @param {Number} nExpression - Specifies the numeric expression
*                               whose arc sine ASIN() returns
*/
function ASIN(nExpression){
    return Math.asin(nExpression);
}

// VFP2Servoy Toolkit
// Function : AT()
// Author   : Omar van Galen
/**
* Searches a character expression for the occurrence of another character expression
*
* @param {String} cSearchValue - Specifies the character expression
*                                to search for in cString
* @param {String} cString - Specifies the character expression to search for
*                           cSearchValue
*/
function AT(cSearchValue, cString){
    return cString.indexOf(cSearchValue)+1;
}

// VFP2Servoy Toolkit
// Function : ATC()
// Author   : Omar van Galen
/**
* Searches a character expression for the occurrence of another character expression
* without regard for the case
*
* @param {String} cSearchValue - Specifies the character expression
*                                to search for in cString
* @param {String} cString - Specifies the character expression
*                           to search for cSearchValue
*/
function ATC(cSearchValue, cString){
    return cString.toLowerCase().indexOf(cSearchValue.toLowerCase())+1;
}

// VFP2Servoy Toolkit
// Function : ATAN()
// Author   : Boudewijn Lutgerink
/**
* Returns in radians the arc tangent of a numeric expression
*
* @param {Number} nExpression - Specifies a numeric expression
*                               whose arc tangent ATAN() returns
*/
function ATAN(nExpression){
    return Math.atan(nExpression);
}

// VFP2Servoy Toolkit
// Function : BETWEEN()
// Author   : Omar van Galen
/**
* Determines whether the value of an expression is inclusively between the values of
* two expressions of the same type.
*
* @param {Object} eTestValue - Specifies an expression to evaluate
* @param {Object} eLowValue - Specifies the lower value in the range
* @param {Object} eHighValue - Specifies the higher value in the range
*/
function BETWEEN(eTestValue, eLowValue, eHighValue) {
    if(eTestValue==null || eLowValue==null || eHighValue==null){
        return null;
    }
    if(eTestValue >= eLowValue && eTestValue <= eHighValue) {
        return true;
    }else{
        return false;
    }
}

// VFP2Servoy Toolkit
// Function : CANCEL()
// Author   : Omar van Galen
/**
* Ends execution of the current application
*/
function CANCEL() {
    application.exit();
}

// VFP2Servoy Toolkit
// Function : CDOW()
// Author   : Omar van Galen
/**
* Returns the day of the week from a given Date or DateTime expression.
*
* @param {Date} dDate - Date to display the week from in the current Locale
*/
function CDOW(dDate) {
    return utils.stringFormat('%tA', new Array(dDate));
}

// VFP2Servoy Toolkit
// Function : CEILING()
// Author   : Omar van Galen
/**
* Returns the next highest integer that is greater than or equal to
* the specified numeric expression
*
* @param {Number} nExpression - Specifies the number whose next highest integer
*                               CEILING() returns
*/
function CEILING(nExpression) {
    return Math.ceil(nExpression);
}

// VFP2Servoy Toolkit
// Function : CHR()
// Author   : Omar van Galen
/**
* Returns the Unicode character associated with the specified number
*
* @param {Number} nUnicodeCharacterNumber
*/
function CHR(nUnicodeCharacterNumber) {
    return utils.getUnicodeCharacterNumber(nUnicodeCharacterNumber);
}

// VFP2Servoy Toolkit
// Function : CHRTRAN()
// Author   : Omar van Galen
/**
* Replaces each character in a character expression that matches a character
* in a second character expression with the corresponding character in a
* third character expression
*
* @param {String} cString
* @param {String} cFindChars
* @param {String} cNewChars
* @returns {String}
*/
function CHRTRAN(cString, cFindChars, cNewChars){
    var cResult = cString;
    var aFindChars = new Array();
    var aNewChars = new Array();
    var nLength = cFindChars.length;
    aFindChars = cFindChars;
    aNewChars = cNewChars;
    if(cNewChars.length < nLength){
        nLength = cNewChars.length ;
    }
    for(var i=0; i < nLength; i++){
        cResult = cResult.replace(aFindChars[i], aNewChars[i]);
    }
    return cResult;
}

// VFP2Servoy Toolkit
// Function : CMONTH()
// Author   : Omar van Galen
/**
* Returns the name of the month from a given Date or DateTime expression.
*
* @param {Date} dDate - Date to display the month from in the current Locale
*
*/
function CMONTH(dDate) {
    return utils.stringFormat('%tB', new Array(dDate));
}

// VFP2Servoy Toolkit
// Function : CONTAINS()
// Author   : Omar van Galen
/**
* Returns true if a character expression is contained in another character expression
* Mimics the VFP $ operator
*
* @param {String} cSearchFor - Specifies the expression looked for within cSearchIn
* @param {String} cSearchIn - Specifies the expression that is searched to see if it
*                             contains cSearchFor
*/
function CONTAINS(cSearchFor, cSearchIn){
    if(cSearchIn.indexOf(cSearchFor)>-1){
        return true;
    }else{
        return false;
    }
}

// VFP2Servoy Toolkit
// Function : COPYFILE()
// Author   : Omar van Galen
/**
* Duplicates any type of file
*
* @param {String} cSourceFile - source file to copy
* @param {String} cDestinationFile - destination file to copy to
*/
function COPYFILE(cSourceFile, cDestinationFile){
    return plugins.file.copyFile(cSourceFile, cDestinationFile);
}

// VFP2Servoy Toolkit
// Function : CTOD()
// Author   : Omar van Galen
/**
* Converts a character expression to a date expression
* Supports both the dd-mm-yyyy and mm/dd/yyyy format
*
* @param {String} cExpression
*/
function CTOD(cExpression){
    if(cExpression.indexOf("-")>-1){
        var nPos1 = cExpression.indexOf("-");
        var nPos2 = cExpression.lastIndexOf("-");
        var nDay = utils.stringToNumber(cExpression.substring(0, nPos1)) ;
        var nMonth = utils.stringToNumber(cExpression.substring(nPos1, nPos2))-1 ;
        var nYear = utils.stringToNumber(cExpression.substr(nPos2+1)) ;
        return new Date(nYear, nMonth, nDay);
    }else{
        return new Date(cExpression);
    }
}

// VFP2Servoy Toolkit
// Function : CURDIR()
// Author   : Omar van Galen
/**
* Returns the Home Directory for the current user
*/
function CURDIR(){
return plugins.file.getHomeFolder();
}

// VFP2Servoy Toolkit
// Function : DATE()
// Author   : Omar van Galen
/**
* Returns the date(time) specified by the given parameters
* where the month does NOT have to be ZERO-based (January=0)
*
* Returns the current date(time) when no parameters are specified
*
* @param {Number} nYear - nYear can be a value from 100 to 275760.
* @param {Number} nMonth - nMonth can be a value from 1 to 12 (NOT 0-11!!).
* @param {Number} nDay - nDay can be a value from 1 to 31.
*/
function DATE(nYear, nMonth, nDay) {
    if(typeof(nYear) != "number"){
        return new Date()
    }else{
        return new Date(nYear, nMonth-1, nDay);
    }
}

// VFP2Servoy Toolkit
// Function : DATETIME()
// Author   : Omar van Galen
/**
* Returns the datetime specified by the given parameters
* where the month does NOT have to be ZERO-based (January=0)
*
* Returns the current date(time) when no parameters are specified
*
* @param {Number} nYear - nYear can be a value from 100 to 275760.
* @param {Number} nMonth - nMonth can be a value from 1 to 12 (NOT 0-11!!).
* @param {Number} nDay - nDay can be a value from 1 to 31.
* @param {Number} nHours - nHours can be a value from 0 to 23.
* @param {Number} nMinutes - nMinutes can be a value from 0 to 59 (NOT 0-11!!).
* @param {Number} nSeconds - nSeconds can be a value from 0 to 59.
*/
function DATETIME(nYear, nMonth, nDay, nHours, nMinutes, nSeconds) {
    if(typeof(nYear) != "number"){
        return new Date()
    }else{
        return new Date(nYear, nMonth-1, nDay, nHours, nMinutes, nSeconds);
    }
}

// VFP2Servoy Toolkit
// Function : DAY()
// Author   : Omar van Galen
/**
* Returns the numeric day of the month for a given date(time) expression
*
* @param {Date} dDate - Specifies a date from which DAY( ) returns a day of the month
*/
function DAY(dDate) {
    return dDate.getDate();
}

// VFP2Servoy Toolkit
// Function : DAYSBETWEEN()
// Author   : Juan Antonio Santana Medina
/**
* Returns the number of days between dDate1 and dDate2.
* Can include portion of days, depending on the time.
*
* @param {Date} dDate1 - Biggest Date
* @param {Date} dDate2 - Smallest Date
* @param {Boolean} lIncludeTime - If true returns the days with decimals
*                                 indicating time difference
*/
function DAYSBETWEEN(dDate1, dDate2, lIncludeTime){
   var nDays=0;
   if(!lIncludeTime){
      dDate1=new Date(dDate1.getFullYear(),dDate1.getMonth(),dDate1.getDate());
      dDate2=new Date(dDate2.getFullYear(),dDate2.getMonth(),dDate2.getDate());
      nDays=Math.round((dDate1.valueOf()-dDate2.valueOf())/(60*60*24*1000));
   }else{
      nDays=(dDate1.valueOf()-dDate2.valueOf())/(60*60*24*1000);
   }
   return nDays;
}

// VFP2Servoy Toolkit
// Function : DELETE_FILE()
// Author   : Omar van Galen
/**
* Erases a file from a disk
*
* @param {String} cFileName - the path and name of the file to delete
*/
function DELETE_FILE(cFileName){
    return plugins.file.deleteFile(cFileName);
}

// VFP2Servoy Toolkit
// Function : DIRECTORY()
// Author   : Omar van Galen
/**
* Determines if the specified file exists
*
* @param {String} cDirectoryName - Specifies the name of the file to locate
* @param {Number} nFlags - Specifies the kind of value DIRECTORY() returns when the
*                     directory exists but might be marked with the Hidden attribute
*/
function DIRECTORY(cDirectoryName, nFlags){
    if(plugins.file.convertToJSFile(cDirectoryName).exists()){
        if((!nFlags || nFlags==0) &&
            plugins.file.convertToJSFile(cDirectoryName).isHidden()){
            return false;
        }else{
            return true;
        }
    }else{
        return false;
    }
}

// VFP2Servoy Toolkit
// Function : DO_FORM()
// Author   : Omar van Galen
/**
* Create a new form instance
*
* @param {String} cDesignFormName
* @param {String} cNewInstanceName
* @return {Boolean}
*/
function DO_FORM(cDesignFormName, cNewInstanceName){
   if(!cNewInstanceName){
      application.showForm(forms[cDesignFormName]);
      return true;
   }else{
      var lOk = application.createNewFormInstance(cDesignFormName, cNewInstanceName);
      if(lOk){
        application.showForm(cNewInstanceName);
      }
      return lOk;
   }
}
 
// VFP2Servoy Toolkit
// Function : DOW()
// Author   : Omar van Galen
/**
* Returns a numeric day-of-the-week value from a Date or DateTime expression
*
* @param {Date} dDate - Specifies the Date expression from which DOW()
*                       returns the day number
*/
function DOW(dDate) {
    return dDate.getDay()+1;
}

// VFP2Servoy Toolkit
// Function : DTOC()
// Author   : Omar van Galen
/**
* Returns a Character-type date from a Date expression
*
* @param {Date} dDate - specifies a date-type variable
* @param {Number} nIndexing - 1 is the only valid value; returns yyyymmdd
*/
function DTOC(dDate, nIndexing) {
  if(nIndexing==1) {
     // return date in ANSI format (yyyyMMdd) suitable for indexing
     return utils.dateFormat(dDate, 'yyyyMMdd')
  }else{
     // return a short datestring in the users locale
     return dDate.toLocaleDateString();
  }
}

// VFP2Servoy Toolkit
// Function : DTOS
// Author   : Omar van Galen / Alessandro Stefanoni
/**
* Returns a character-string date in a yyyymmdd format from
* a specified Date or DateTime expression
*
* @param {Date} dDate - Specifies the Date expression DTOS( ) converts
*                       to an eight-digit character string
*/
function DTOS(dDate){
    // return date in ANSI format (yyyyMMdd) suitable for indexing
    return utils.dateFormat(dDate, 'yyyyMMdd')
}

// VFP2Servoy Toolkit
// Function : EMPTY
// Author   : Omar van Galen
/**
* Determines whether an expression evaluates to empty
*
* @param {Object} eExpression - Specifies the expression that EMPTY() evaluates
*/
function EMPTY(eExpression){
    if(typeof(eExpression)=="string"){
        return (utils.stringTrim(eExpression)=="");
    }
    if(typeof(eExpression)=="number"){
        return (eExpression==0);
    }
    if(typeof(eExpression)=="boolean"){
        return !eExpression;
    }
    if(typeof(eExpression)=="undefined"){
        return false;
    }
    return false;
}

// VFP2Servoy Toolkit
// Function : ERASE()
// Author   : Omar van Galen
/**
* Erases a file from a disk
*
* @param {String} cFileName - the path and name of the file to delete
*/
function ERASE(cFileName){
    return plugins.file.deleteFile(cFileName);
}

// VFP2Servoy Toolkit
// Function : EVALUATE()
// Author   : Omar van Galen
/**
* Evaluates a character expression and returns the result
* @param {String} cExpression
*/
function EVALUATE(cExpression){
    // Be careful! Might not work as expected and combined with user
    // input could be a security risk! (Servoy says: eval()==evil)
    return eval(cExpression);
}

// VFP2Servoy Toolkit
// Function : EXP()
// Author   : Omar van Galen
/**
* Returns the value of ex where x is a specified numeric expression
*
* @param {Number} nExpression - Specifies the exponent, x, in the exponential
*                               expression ex.
*/
function EXP(nExpression) {
    return Math.exp(nExpression);
}

// VFP2Servoy Toolkit
// Function : FILE()
// Author   : Omar van Galen
/**
* Determines if the specified file exists
*
* @param {String} cFileName - Specifies the name of the file to locate
* @param {Number} nFlags - Specifies the kind of value FILE( ) returns when the file
*                          exists but might be marked with the Hidden attribute
*/
function FILE(cFileName, nFlags){
    if(plugins.file.convertToJSFile(cFileName).exists()){
        if((!nFlags || nFlags==0) &&
                plugins.file.convertToJSFile(cFileName).isHidden()){
            return false;
        }else{
            return true;
        }
    }else{
        return false;
    }
}

// VFP2Servoy Toolkit
// Function : FILETOSTR()
// Author   : Omar van Galen
/**
* Returns the contents of a file as a character string
*
* @param {String} cFileName - path and name of the file to read
* @return {String}
*/
function FILETOSTR(cFileName){
    return plugins.file.readTXTFile(cFileName);
}

// VFP2Servoy Toolkit
// Function : FLOOR()
// Author   : Omar van Galen
/**
* Returns the nearest integer that is less than or equal to
* the specified numeric expression
*
* @param {Number} nExpression - Specifies the numeric expression for which FLOOR()
*    returns the nearest integer that is less than or equal to the numeric expression
*/
function FLOOR(nExpression) {
    return Math.floor(nExpression);
}

// VFP2Servoy Toolkit
// Function : GETCOLOR()
// Author   : Omar van Galen
/**
* Show Color Picker Dialog and return the result
* @param {String} cColorString
*/
function GETCOLOR(cColorString){
    return application.showColorChooser(cColorString);
}

// VFP2Servoy Toolkit
// Function : GETDIR()
// Author   : Omar van Galen
/**
* Displays the Select Directory dialog box from which you can choose a directory
*
* @param {String} cInitialDirectory
* @param {String} cTitleBarCaption
* @return {JSFile}
*/
function GETDIR(cInitialDirectory, cTitleBarCaption){
   return plugins.file.showDirectorySelectDialog(cInitialDirectory, cTitleBarCaption);
}

// VFP2Servoy Toolkit
// Function : GETFILE()
// Author   : Omar van Galen
/**
* Displays the Open dialog box
*
* @param {String} cFileExtensions - i.e.: "pdf" or  [".pdf", ".txt"]
* @param {String} cStartDir - i.e.: c:\\temp\\
* @param {Boolean} lMultiSelect - true/false 
* @param {String} cTitleBarCaption
* @return {Object} - returns JSFile or Array
*/
function GETFILE(cFileExtensions, cStartDir, lMultiSelect, cTitleBarCaption) {
    return plugins.file.showFileOpenDialog(1, cStartDir, lMultiSelect,
         cFileExtensions, "", cTitleBarCaption)
}

// VFP2Servoy Toolkit
// Function : GETFONT()
// Author   : Omar van Galen
/**
* Displays the Font Chooser Dialog and returns the users choice
* @param {String} cFontName
*/
function GETFONT(cFontName){
    return application.showFontChooser(cFontName);
}

// VFP2Servoy Toolkit
// Function : GETWORDCOUNT()
// Author   : Omar van Galen
/**
* Counts the words in a string
*
* @param {String} cString
* @param {String} cDelimiters
* @returns {Number}
*/
function GETWORDCOUNT(cString, cDelimiters){
    if(cDelimiters){
        return utils.stringPatternCount(cString, utils.stringTrim(cDelimiters))+1;
    }
    return utils.stringWordCount(cString);
}

// VFP2Servoy Toolkit
// Function : GETWORDNUM()
// Author   : Omar van Galen
/**
* Returns a specified word from a string
*
* @param {String} cString
* @param {Number} nIndex
* @param {String} cDelimiter
* @returns {String}
*/
function GETWORDNUM(cString, nIndex, cDelimiter){
    if(cDelimiter){
        cString = cDelimiter+cString;
        var nPos1 = utils.stringPosition(cString, cDelimiter, 0, nIndex);
        var nPos2 = utils.stringPosition(cString, cDelimiter, nPos1+1, 1);
        if(nPos2 == -1){
            return cString.substring(nPos1);
        }else{
            return cString.substring(nPos1, nPos2-1);
        }
    }
    return utils.stringMiddleWords(cString, nIndex, 1);
}

// VFP2Servoy Toolkit
// Function : GOBOTTOM()
// Author   : Omar van Galen
/**
* Makes the last record in the foundset the active one
*/
function GOBOTTOM() {
    controller.setSelectedIndex(foundset.getSize());
    return;
}

// VFP2Servoy Toolkit
// Function : GODATE()
// Author   : Juan Antonio Santana Medina
/**
* Returns a new Date adding nDays
*
* @param {Date} dDate - Date to add/substract the nDays
* @param {Number} nDays - Number of days to add/substract to dDate
*/
function GODATE(dDate, nDays){
    var dTemp = new Date(dDate.valueOf());
    return new Date(dTemp.setDate(dTemp.getDate() + nDays));
}

// VFP2Servoy Toolkit
// Function : GOMONTH()
// Author   : Juan Antonio Santana Medina (the first contributor!)
/**
* Returns the date that is a specified number of months before or after
* a given Date expression
*
* @param {Date} dDate - Date to add or substract the months
* @param {Number} nMonths - Number of months to add/substract to tDate
*/
function GOMONTH(dDate, nMonths) {
    var dTemp = new Date(dDate.valueOf());
    return new Date(dTemp.setMonth(dTemp.getMonth() + nMonths));
}

// VFP2Servoy Toolkit
// Function : GOTO()
// Author   : Omar van Galen
/**
* Go to the specified record
*/
function GOTO(nIndex) {
    controller.setSelectedIndex(nIndex);
    return;
}

// VFP2Servoy Toolkit
// Function : GOTOP()
// Author   : Omar van Galen
/**
* Makes the first record in the foundset the active one
*/
function GOTOP() {
    controller.setSelectedIndex(1);
    return;
}

// VFP2Servoy Toolkit
// Function : HOME()
// Author   : Omar van Galen
/**
* Returns the users home directory (default=C:\Users\[computername]\)
*/
function HOME(){
    return plugins.file.getHomeFolder();
}

// VFP2Servoy Toolkit
// Function : HOUR()
// Author   : Omar van Galen
/**
* Returns the hour portion from a datetime expression
* @param {Date} dDate - Datetime from which HOUR( ) returns the hour
*/
function HOUR(dDate){
    return dDate.getHours();
}

// VFP2Servoy Toolkit
// Function : ID()
// Author   : wOOdy / Alexander Schwedler
/**
* Returns network information simular to SYS(0) in a network environment
*
*/
function ID(){
    return application.getHostName() + " # " + security.getSystemUserName();
}

// VFP2Servoy Toolkit
// Function : IIF()
// Author   : Omar van Galen
/**
* Returns one of two values depending on the value of a logical expression
*
* @param {Boolean} lExpression
* @param {Object} eExpression1
* @param {Object} eExpression2
*/
function IIF(lExpression, eExpression1, eExpression2){
    if(lExpression){
        return eExpression1;
    }else{
        return eExpression2;
    }
}

// VFP2Servoy Toolkit
// Function : INLIST()
// Author   : Omar van Galen
/**
* Determines whether an expression matches another expression in a set of expressions
*/
function INLIST(){
    // store argument[0] (the searchValue) in a seperate variable
    var searchValue = arguments[0];
    // convert the arguments collection into a normal array
    var stringArgs = Array.prototype.slice.apply(arguments);
    // shift the searchValue out of the array
    stringArgs.shift();
    // now search the array for the searchValue
    return stringArgs.indexOf(searchValue) > -1
}

// VFP2Servoy Toolkit
// Function : INPUTBOX()
// Author   : Omar van Galen
/**
* Displays a modal dialog for input of a single string
*
* @param {String} cInputPrompt
* @param {String} cDialogCaption
* @param {String} cDefaultValue
* @returns {String}
*/
function INPUTBOX(cInputPrompt, cDialogCaption, cDefaultValue){
    if(!cDialogCaption) cDialogCaption="";
    if(!cDefaultValue) cDefaultValue="";
    return plugins.dialogs.showInputDialog(cDialogCaption,cInputPrompt,cDefaultValue);
}

// VFP2Servoy Toolkit
// Function : INT()
// Author   : Omar van Galen
/**
* Evaluates a numeric expression and returns the integer portion of the expression
* @param {Number} nExpression
* @returns {Number}
*/
function INT(nExpression){
    if(nExpression < 0){
        return Math.ceil(nExpression);
    }else{
        return Math.floor(nExpression);
    }
}

// VFP2Servoy Toolkit
// Function : ISALPHA()
// Author   : Omar van Galen
/**
* ISALPHA( ) returns true if the leftmost character in the specified character expression
* is an alphabetic character; otherwise ISALPHA( ) returns false
*
* @param {String} cExpression
* @return {Boolean}
*/
function ISALPHA(cExpression){
    var cFirstCharacter = cExpression.charAt(0);
    // Below a regular expression is used
    // [^...] Matches every character except the ones inside brackets
    // \W = Non-alphanumeric characters
    // 0-9 = digits
    // _ = underscore
    return cFirstCharacter.match(/[^\W0-9_]/)!=null;
}

// VFP2Servoy Toolkit
// Function : ISDIGIT()
// Author   : Omar van Galen
/**
* Determines whether the leftmost character of the specified
* character expression is a digit (0 through 9)
*
* @param {String} cExpression
* @return {Boolean}
*/
function ISDIGIT(cExpression){
    var cFirstCharacter = cExpression.charAt(0);
    return cFirstCharacter.match(/[0-9]/)!=null;
}

// VFP2Servoy Toolkit
// Function : ISLOWER()
// Author   : Omar van Galen
/**
* Determines whether the leftmost character of the specified character
* expression is a lowercase alphabetic character
*
* @param {String} cExpression
* @returns {Boolean}
*/
function ISLOWER(cExpression){
    var cFirstCharacter = cExpression.charAt(0);
    // Test if first char ISALPHA() and if it is lowercase
    return cFirstCharacter.match(/[^\W0-9_]/)!=null &&
            cFirstCharacter == cFirstCharacter.toLowerCase();
}

// VFP2Servoy Toolkit
// Function : ISNULL()
// Author   : Omar van Galen
/**
* Returns true if an expression evaluates to a null value; otherwise,
* ISNULL( ) returns false
*
* @param {Object} eExpression - Specifies the expression to evaluate
*/
function ISNULL(eExpression){
    return (eExpression==null);
}

// VFP2Servoy Toolkit
// Function : ISUPPER()
// Author   : Omar van Galen
/**
* Determines whether the leftmost character of the specified character
* expression is a uppercase alphabetic character
*
* @param {String} cExpression
* @returns {Boolean}
*/
function ISUPPER(cExpression){
    var cFirstCharacter = cExpression.charAt(0);
    // Test if the first char ISALPHA() and if it is uppercase
    return cFirstCharacter.match(/[^\W0-9_]/)!=null &&
            cFirstCharacter == cFirstCharacter.toUpperCase();
}

// VFP2Servoy Toolkit
// Function : JUSTDRIVE()
// Author   : Omar van Galen
/**
* Returns the drive letter from a complete path
* @param {String} cPath
* @returns {String}
*/
function JUSTDRIVE(cPath){
    if(cPath.substr(1,1)==":"){
        return cPath.substr(0,2);
    }
    return "";
}

// VFP2Servoy Toolkit
// Function : JUSTEXT()
// Author   : Omar van Galen
/**
* Returns the characters from a file extension from a complete path
* @param {String} cPath
* @returns {String}
*/
function JUSTEXT(cPath){
    if(cPath.lastIndexOf(".")>-1){
        return cPath.substr(cPath.lastIndexOf(".")+1);
    }
    return "";
}

// VFP2Servoy Toolkit
// Function : JUSTFNAME()
// Author   : Omar van Galen
/**
* Returns the filename from a complete path
* @param {String} cPath
* @returns {String}
*/
function JUSTFNAME(cPath){
    if(cPath.lastIndexOf("\\")>-1){
        return cPath.substr(cPath.lastIndexOf("\\")+1);
    }
    return cPath;
}

// VFP2Servoy Toolkit
// Function : JUSTPATH()
// Author   : Omar van Galen
/**
* Returns the path portion of a complete path and file name
* @param {String} cPath
* @returns {String}
*/
function JUSTPATH(cPath){
    if(cPath.lastIndexOf("\\")>-1){
        return cPath.substring(0, cPath.lastIndexOf("\\")+1) ;
    }
    return "";
}

// VFP2Servoy Toolkit
// Function : JUSTSTEM()
// Author   : Omar van Galen
/**
* Returns the stem name (the file name before the extension)
* from a complete path and file name
*
* @param {String} cPath
* @returns {String}
*/
function JUSTSTEM(cPath){
    var cStem = cPath;
    if(cStem.lastIndexOf("\\")>-1){
        cStem = cStem.substr(cPath.lastIndexOf("\\")+1) ;
    }
    if(cStem.lastIndexOf(".")>-1){
        cStem = cStem.substring(0, cStem.lastIndexOf(".")) ;
    }
    return cStem;
}

// VFP2Servoy Toolkit
// Function : LEFT()
// Author   : Boudewijn Lutgerink
/**
* Returns a specified number of characters from a character expression,
* starting with the leftmost character
*
* @param {String} cString - the string to return the the leftmost part from
* @param {Number} nNumberOfCharacters - Specifies the number of characters to return
*/
function LEFT(cString, nNumberOfCharacters){
    return utils.stringLeft(cString, nNumberOfCharacters);
}

// VFP2Servoy Toolkit
// Function : LEN()
// Author   : Omar van Galen
/**
* Determines the number of characters in a character expression, indicating the length
* of the expression
*
* @param {String} cString - Specifies the character expression for which LEN( )
*                           returns the number of characters
*/
function LEN(cString){
    return utils.stringTrim(cString).length;
}

// VFP2Servoy Toolkit
// Function : LOCK()
// Author   : Omar van Galen
/**
* Attempts to lock one or more records in a table
*
* @param {foundset} oFoundset
* @param {Number} nRecNo (-1=all rows, 0=current row, x=specific row)
* @returns {Boolean}
*/
function LOCK(oFoundset, nRecNo){
    return databaseManager.acquireLock(oFoundset, nRecNo);
}

// VFP2Servoy Toolkit
// Function : LOG()
// Author   : Omar van Galen
/**
* Returns the natural logarithm (base e) of the specified numeric expression
*
* @param {Number} nExpression - Specifies the numeric expression for which LOG( )
*                         returns the value of x in the equation e^x = nExpression
*/
function LOG(nExpression) {
    return Math.log(nExpression);
}

// VFP2Servoy Toolkit
// Function : LOWER()
// Author   : Boudewijn Lutgerink
/**
* Returns the specified character expression in lowercase
*
* @param {String} cExpression - Specifies the character expression LOWER() converts
*                               to lowercase
*/
function LOWER(cExpression){
    return cExpression.toLowerCase();
}

// VFP2Servoy Toolkit
// Function : LTRIM()
// Author   : Omar van Galen
/**
* Removes all leading spaces from the specified character expression
*
* @param {String} cExpression
* @returns {String}
*/
function LTRIM(cExpression){
    while (utils.stringLeft(cExpression,1)==" "){
        cExpression = cExpression.substr(1);
    }
    return cExpression;
}

// VFP2Servoy Toolkit
// Function : MAX()
// Author   : Omar van Galen
/**
* Evaluates a set of expressions and returns the expression with the maximum value
*
* @param {Object} eExpression1, eExpression2, [eExpressionN] - Specify the expressions *         from which you want MAX( ) to return the expression with the highest value
*         All the expressions must be of the same data type
*/
function MAX(){
    var argumentType = typeof(arguments[0]);
    if(argumentType=="object" && arguments[0].getDate() > 0){
        argumentType = "datetime";
    }

    switch( argumentType ){
    case "number":
        // pass the arguments to the Math.max() function
        return Math.max.apply(this, arguments) ;

    case "string":
        // turn the arguments collection into a normal array
        // and then sort and reverse it
        // and then pass back the first element
        var stringArgs = Array.prototype.slice.apply(arguments).sort().reverse();
        return stringArgs[0];

    case "datetime":
        // support dates
        // first create a normal array with the dates in it
        var dateArgs = Array.prototype.slice.apply(arguments);
        // map the date objects to a new array using their valueOf
        // which is suitable for sorting
        var aDates = dateArgs.map(function(item) {
                return item.valueOf();
            }).sort().reverse();
        return new Date(aDates[0]);
    }
    application.output("incompatible datatypes");
    return ;
}

// VFP2Servoy Toolkit
// Function : MD()
// Author   : Omar van Galen
/**
* @param {String} cPath - the path of the folder to create
*/
function MD(cPath){
    return plugins.file.createFolder(cPath);
}

// VFP2Servoy Toolkit
// Function : MESSAGEBOX()
// Author   : Omar van Galen
/**
* Displays a user-defined dialog box
*
* @param {String} cMessage
* @param {Number} nDialogBoxType
* @param {String} cTitleBarText
* @returns {String}
*/
function MESSAGEBOX(cMessage, nDialogBoxType, cTitleBarText){
    if(!nDialogBoxType) nDialogBoxType=0;
    var cmd = "";
    if(nDialogBoxType < 16){
        cmd = 'plugins.dialogs.showInfoDialog(cTitleBarText, cMessage, ';
    }
    if(nDialogBoxType >= 16 && nDialogBoxType < 32) {
        nDialogBoxType = nDialogBoxType - 16;
        cmd = 'plugins.dialogs.showErrorDialog(cTitleBarText, cMessage, ';
    }
    if(nDialogBoxType >= 32 && nDialogBoxType < 48) {
        nDialogBoxType = nDialogBoxType - 32;
        cmd = 'plugins.dialogs.showQuestionDialog(cTitleBarText, cMessage, ';
    }
    if(nDialogBoxType >= 48 && nDialogBoxType < 64) {
        nDialogBoxType = nDialogBoxType - 48;
        cmd = 'plugins.dialogs.showWarningDialog(cTitleBarText, cMessage, ';
    }
    if(nDialogBoxType >= 64) {
        nDialogBoxType = nDialogBoxType - 64;
        cmd = 'plugins.dialogs.showInfoDialog(cTitleBarText, cMessage, ';
    }
    if(nDialogBoxType==0) cmd = cmd + '"OK")';
    if(nDialogBoxType==1) cmd = cmd + '"OK", "Cancel")';
    if(nDialogBoxType==2) cmd = cmd + '"Abort", "Retry", "Ignore")';
    if(nDialogBoxType==3) cmd = cmd + '"Yes", "No", "Cancel")';
    if(nDialogBoxType==4) cmd = cmd + '"Yes", "No")';
    if(nDialogBoxType==5) cmd = cmd + '"Retry", "Cancel")';
    return eval(cmd).toString();
}

// VFP2Servoy Toolkit
// Function : MIN()
// Author   : Omar van Galen
/**
* Evaluates a set of expressions and returns the expression with the minimum value
*
* @param {Object} eExpression1, eExpression2, [eExpressionN] - Specify the expressions
*         from which you want MIN( ) to return the expression with the lowest value.
*         All the expressions must be of the same data type
*/
function MIN(){
    var argumentType = typeof(arguments[0]);
    if(argumentType=="object" && arguments[0].getDate() > 0){
        argumentType = "datetime";
    }

    switch( argumentType ){
    case "number":
        // pass the arguments to the Math.max() function
        return Math.min.apply(this, arguments) ;

    case "string":
        // turn the arguments collection into a normal array
        // and then sort it and then pass back the first element
        var stringArgs = Array.prototype.slice.apply(arguments).sort();
        return stringArgs[0];

    case "datetime":
        // support dates
        // first create a normal array with the dates in it
        var dateArgs = Array.prototype.slice.apply(arguments);
        // map the date objects to a new array using their valueOf
        // which is suitable for sorting
        var aDates = dateArgs.map(function(item) {
                return item.valueOf();
            }).sort();
        return new Date(aDates[0]);
    }
    application.output("incompatible datatypes");
    return ;
}

// VFP2Servoy Toolkit
// Function : MINUTE()
// Author   : Omar van Galen
/**
* Returns the minutes portion from a datetime expression
* @param {Date} dDate - Datetime from which MINUTE( ) returns the minutes
*/
function MINUTE(dDate){
    return dDate.getMinutes();
}

// VFP2Servoy Toolkit
// Function : MKDIR()
// Author   : Omar van Galen
/**
* @param {String} cPath - the path of the folder to create
*/
function MKDIR(cPath){
    return plugins.file.createFolder(cPath);
}

// VFP2Servoy Toolkit
// Function : MOD()
// Author   : Omar van Galen
/**
* Divides one numeric expression by another numeric expression and returns the
* remainder
*
* @param {Number} nDividend - Specifies the dividend
* @param {Number} nDivisor - Specifies the divisor
*/
function MOD(nDividend, nDivisor) {
    return nDividend % nDivisor;
}

// VFP2Servoy Toolkit
// Function : MONTH()
// Author   : Omar van Galen
/**
* Returns the number of the month (January as 1 instead of 0)
*
* @param {Date} dDate Date from which to return the month
*/
function MONTH(dDate) {
   return dDate.getMonth()+1;
}

// VFP2Servoy Toolkit
// Function : MOVEFILE()
// Author   : Omar van Galen
/**
* Duplicates any type of file
*
* @param {String} cSourceFile - source file to move
* @param {String} cDestinationFile - destination file to move to
*/
function MOVEFILE(cSourceFile, cDestinationFile){
    return plugins.file.moveFile(cSourceFile, cDestinationFile);
}

// VFP2Servoy Toolkit
// Function : msg()
// Author   : Omar van Galen
/**
* Simplified version of MESSAGEBOX() and InfoDialog
* This is not a VFP function
*
* @param {String} cMessage
* @returns {String}
*/
function msg(cMessage){
    return plugins.dialogs.showInfoDialog("", cMessage, "Ok");
}

// VFP2Servoy Toolkit
// Function : NVL()
// Author   : Juan Antonio Santana Medina
/**
* Returns eExpression2 if eExpression1 evaluates to a null value.
* Returns eExpression1 if eExpresion1 is not a null value.
* Returns null if both, eExpression1 and eExpression2, evaluates to a null value.
*
* @param {Object} eExpression1 - Main expression to evaluate
* @param {Object} eExpression2 - Alternative value to eExpresssion1
*/
function NVL(eExpression1, eExpression2){
    var eReturn=null;
    if(eExpression1!=null){
        eReturn=eExpression1;
    }else{
        if(eExpression2!=null){
            eReturn=eExpression2;
        }
    }
    return eReturn;
}

// VFP2Servoy Toolkit
// Function : OCCURS()
// Author   : Omar van Galen
/**
* Returns the number of times a character expression occurs within another character
* expression
*
* @param {String} cSearchValue - Specifies a character expression that OCCURS( )
*                                searches for within cString
* @param {String} cString - Specifies the character expression OCCURS( ) to search in
*/
function OCCURS(cSearchValue, cString){
    return utils.stringPatternCount(cString, cSearchValue);
}

// VFP2Servoy Toolkit
// Function : OS()
// Author   : Omar van Galen
/**
* Returns the users home directory (default=C:\Users\[computername]\)
*/
function OS(){
    return application.getOSName();
}

// VFP2Servoy Toolkit
// Function : PADL()
// Author   : Juan Antonio Santana Medina
/**
* Returns a string with the length of nLength padded with cPadChar on the left
*
* @param {String} cString - String to pad
* @param {Number} nLength - Final length of the string
* @param {String} cPadChar - Character to fill the string
*/
function PADL(cString , nLength, cPadChar){
    var lcReturn=cString;
    if(typeof(cString)=="string" && typeof(nLength)=="number"){
        lcReturn=utils.stringTrim(cString);
        if(cPadChar==null) cPadChar=' ';
            lcReturn=globals.REPLICATE(cPadChar,(nLength-lcReturn.length))+lcReturn;
        }
    return lcReturn;
}

// VFP2Servoy Toolkit
// Function : PADR()
// Author   : Juan Antonio Santana Medina
/**
* Returns a string with the length of nLength padded with cPadChar on the right
*
* @param {String} cString - String to pad
* @param {Number} nLength - Final length of the string
* @param {String} cPadChar - Character to fill the string
*/
function PADR(cString , nLength, cPadChar){
    var lcReturn=cString;
    if(typeof(cString)=="string" && typeof(nLength)=="number"){
        lcReturn=utils.stringTrim(cString);
        if(cPadChar==null) cPadChar=' ';
            lcReturn=lcReturn+globals.REPLICATE(cPadChar,(nLength-lcReturn.length));
        }
    return lcReturn;
}

// VFP2Servoy Toolkit
// Function : PARAMETERS()
// Author   : Omar van Galen
/**
* Returns the number of parameters passed to the current function/method
*
* @returns {Number}
*/
function PARAMETERS(){
    return arguments.length;
}

// VFP2Servoy Toolkit
// Function : PCOUNT()
// Author   : Omar van Galen
/**
* Returns the number of parameters passed to the current function/method
*
* @returns {Number}
*/
function PCOUNT(){
    return arguments.length;
}

// VFP2Servoy Toolkit
// Function : PI()
// Author   : Boudewijn Lutgerink
/**
* Returns the numeric constant pi
* The numeric constant pi (3.141592) is the ratio of the circumference
* of a circle to its diameter
*/
function PI(){
    return Math.PI;
}

// VFP2Servoy Toolkit
// Function : POW()
// Author   : Omar van Galen
/**
* Returns base to the exponent power
*
* @param {Number} nBase - Specifies the numeric expression to use for the base
* @param {Number} nExponent - Specifies the numeric expression to use as the exponent
*/
function POW(nBase, nExponent){
    return Math.pow(nBase, nExponent);
}

// VFP2Servoy Toolkit
// Function : PROPER
// Author   : Omar van Galen
/**
* Returns from a character expression a string where each word is capitalized
*
* @param {String} cExpression
* @returns {String}
*/
function PROPER(cExpression){
    return utils.stringInitCap(cExpression);
}

// VFP2Servoy Toolkit
// Function : PUTFILE
// Author   : Omar van Galen
/**
* Invokes the Save As dialog box and returns a JSFile object of the saved file
*
* @param {String} cFileName
* @param {String} cTitleBarCaption
* @return {JSFile}
/
function PUTFILE(cFileName, cTitleBarCaption) {
    return plugins.file.showFileSaveDialog(cFileName, cTitleBarCaption);
}

// VFP2Servoy Toolkit
// Function : QUARTER
// Author   : Omar van Galen
/**
* Returns the quarter of the year in which a date(time) expression occurs
*
* @param {Date} dDate - Specifies the Date expression for which you want QUARTER( )
*                       to return a value
*/
function QUARTER(dDate){
    return Math.ceil((dDate.getMonth()+1)/3); //  month is zero-based so add 1
}

// VFP2Servoy Toolkit
// Function : QUIT()
// Author   : Omar van Galen
/**
* Ends execution of the current application
*/
function QUIT() {
    application.exit();
}

// VFP2Servoy Toolkit
// Function : RAND()
// Author   : Omar van Galen
/**
* Returns a random number between 0 and 1 if no parameters are specified
*
* @param {Number} nRangeMin - the lowest including value of the range
* @param {Number} nRangeMax - the highest including value of the range
*/
function RAND(nRangeMin, nRangeMax){
    if(nRangeMax && nRangeMin){
        return Math.floor(Math.random() * (nRangeMax - nRangeMin + 1)) + nRangeMin;
    }
    return Math.random();
}

// VFP2Servoy Toolkit
// Function : RAT()
// Author   : Omar van Galen
/**
* Returns the numeric position of the last (rightmost) occurrence of a
* character string within another character string
*
* @param {String} cSearchValue
* @param {String} cString
* @returns {Number}
*/
function RAT(cSearchValue, cString){
    return cString.lastIndexOf(cSearchValue)+1;
}

// VFP2Servoy Toolkit
// Function : RD()
// Author   : Omar van Galen
/**
* Removes a directory or folder from disk
*
* @param {String} cPath - Specifies the name and location of the directory
*                         or folder to remove from disk
* @param {Boolean} lShowWarning - Shows warning if true
*/
function RD(cPath, lShowWarning){
    return plugins.file.deleteFolder(cPath, lShowWarning);
}

// VFP2Servoy Toolkit
// Function : RECCOUNT()
// Author   : Omar van Galen/Peter de Groot
/**
* Returns the number of records in the specified foundset
* @param {foundset} oFoundset
* @returns {Number}
*/
function RECCOUNT(oFoundset){
    return databaseManager.getFoundSetCount(oFoundset);
}

// VFP2Servoy Toolkit
// Function : RENAME()
// Author   : Omar van Galen
/**
* Renames a file
*
* @param {String} cSourceFile - source file to rename
* @param {String} cDestinationFile - destination file to rename to
*/
function RENAME(cSourceFile, cDestinationFile){
    return plugins.file.moveFile(cSourceFile, cDestinationFile);
}

// VFP2Servoy Toolkit
// Function : REPLICATE()
// Author   : Juan Antonio Santana Medina
/**
* Returns a string of nTimes cChar
*
* @param {String} cChar - Character to be repeated
* @param {Number} nTimes - Times cChar must be repeated
*/
function REPLICATE(cChar, nTimes){
    var lcReturn='';
    if(typeof(cChar)=="string" && typeof(nTimes)=="number"){
        cChar=utils.stringLeft(cChar,1);
        for ( var i = 1 ; i <= nTimes ; i++ ){
            lcReturn += cChar;
        }
    }
    return lcReturn;
}

// VFP2Servoy Toolkit
// Function : RIGHT()
// Author   : Boudewijn Lutgerink
/**
* Returns a specified number of characters from a character expression,
* starting with the rightmost character
*
* @param {String} cString - Specifies the character expression whose rightmost
*                           characters are returned
* @param {Number} nNumberOfCharacters - Specifies the number of characters to be
*                                       returned from the character expression
*/
function RIGHT(cString, nNumberOfCharacters){
    return utils.stringRight(cString, nNumberOfCharacters);
}

// VFP2Servoy Toolkit
// Function : RLOCK()
// Author   : Omar van Galen
/**
* Attempts to lock one or more records in a table
*
* @param {foundset} oFoundset
* @param {Number} nRecNo (-1=all rows, 0=current row, x=specific row)
* @returns {Boolean}
*/
function RLOCK(oFoundset, nRecNo){
    return databaseManager.acquireLock(oFoundset, nRecNo);
}

// VFP2Servoy Toolkit
// Function : RMDIR()
// Author   : Omar van Galen
/**
* Removes a directory or folder from disk
*
* @param {String} cPath - Specifies the name and location of the directory
*                         or folder to remove from disk
* @param {Boolean} lShowWarning - Shows warning if true
*/
function RMDIR(cPath, lShowWarning){
    return plugins.file.deleteFolder(cPath, lShowWarning);
}

// VFP2Servoy Toolkit
// Function : ROUND()
// Author   : Omar van Galen
/**
* Returns a numeric expression rounded to a specified number of decimal places
*
* @param {Number} nExpression - Specifies the numeric expression whose
*                               value is to be rounded
* @param {Number} nDecimalPlaces - Specifies the number of decimal places
*                                  nExpression is rounded to 
*/
function ROUND(nExpression, nDecimalPlaces){
    return Math.round(nExpression * Math.pow(10, nDecimalPlaces)) /
        Math.pow(10,nDecimalPlaces);
}

// VFP2Servoy Toolkit
// Function : RTRIM()
// Author   : Omar van Galen
/**
* Removes all trailing spaces from the specified character expression
*
* @param {String} cExpression
* @returns {String}
*/
function RTRIM(cExpression){
    while (utils.stringRight(cExpression,1)==" "){
        cExpression = cExpression.substr(0, cExpression.length-1);
    }
    return cExpression;
}

// VFP2Servoy Toolkit
// Function : RUN()
// Author   : Omar van Galen
/**
* Execute an external program
*
* @param {String} cProgramName
* @param {Boolean} lBackGround
*/
function RUN(cProgramName, lBackGround){
    if(!lBackGround){
        return application.executeProgram(cProgramName);
    }else{
        return application.executeProgramInBackground(cProgramName);
    }
}

// VFP2Servoy Toolkit
// Function : SEC()
// Author   : Omar van Galen
/**
* Returns the seconds portion from a datetime expression

* @param {Date} dDate - Datetime from which SEC( ) returns the seconds
*/
function SEC(dDate){
    return dDate.getSeconds();
}

// VFP2Servoy Toolkit
// Function : SECONDS()
// Author   : Omar van Galen
/**
* Returns the number of seconds that have elapsed since midnight
*
* @returns {Number}
*/
function SECONDS(){
    var dDate = new Date();
    return (dDate.getHours()*60*60)+(dDate.getMinutes()*60)+dDate.getSeconds();
}

// VFP2Servoy Toolkit
// Function : SET_MESSAGE_TO()
// Author   : Omar van Galen
/**
* Set statusbar text and tooltip message
*
* @param {String} cMessage
* @param {String} cTooltipText
*/
function SET_MESSAGE_TO(cMessage, cTooltipText){
    return application.setStatusText(cMessage, cTooltipText);
}

// VFP2Servoy Toolkit
// Function : SIGN()
// Author   : Omar van Galen
/**
* Returns a numeric value of 1, –1, or 0 if the specified numeric expression
* evaluates to a positive, negative, or 0 value
*
* @param {Object} nExpression
* @returns {Number}
*/
function SIGN(nExpression){
    if(nExpression<0) return -1;
    if(nExpression>0) return 1;
    return 0;
}

// VFP2Servoy Toolkit
// Function : SKIP()
// Author   : Omar van Galen
/**
* Move the record pointer forward or backward
*/
function SKIP(nRecords) {
    controller.setSelectedIndex(foundset.getSelectedIndex()+nRecords);
    return;
}

// VFP2Servoy Toolkit
// Function : SPACE()
// Author   : Omar van Galen
/**
* Returns a character string composed of a specified number of spaces
*
* @param {Number} nSpaces
* @returns {String}
*/
function SPACE(nSpaces){
    var cReturn = "";
    for(var i = 0; i < nSpaces; i++){
        cReturn = cReturn + " ";
    }
    return cReturn;
}

// VFP2Servoy Toolkit
// Function : SQRT()
// Author   : Omar van Galen
/**
* Returns the square root of the specified numeric expression
*
* @param {Number} nExpression - Specifies the numeric expression SQRT( ) evaluates
*/
function SQRT(nExpression){
    return Math.sqrt(nExpression);
}

// VFP2Servoy Toolkit
// Function : STR()
// Author   : Omar van Galen
/**
* Returns the character equivalent of a numeric expression
*
* @param {Number} nExpression
* @param {Number} nDecimals
* @param {Boolean} lSeparator
* @returns {String}
*/
function STR(nExpression, nDecimals, lSeparator){
    if (!nDecimals) nDecimals=0;
        var cExpression = utils.numberFormat(nExpression, nDecimals);
        if (!lSeparator){
            var cTemp = utils.numberFormat(1111, 0);
            var cSeparator = cTemp.substring(2,1);
            cExpression = utils.stringReplace(cExpression,cSeparator,'');
    }
    return cExpression;
}

// VFP2Servoy Toolkit
// Function : STREXTRACT()
// Author   : Omar van Galen
/**
* Retrieves a string between two delimiters
*
* @param {String} cString
* @param {String} cBeginDelim
* @param {String} cEndDelim
* @param {Number} nOccurrence
* @param {Boolean} lCaseInsensitive
* @returns {String}
*/
function STREXTRACT(cString, cBeginDelim, cEndDelim, nOccurrence, lCaseInsensitive){
    if(!nOccurrence) nOccurrence=1;
    var nPos1;
    var nPos2;
    if(lCaseInsensitive){
        nPos1 = utils.stringPosition(cString.toLowerCase(), cBeginDelim.toLowerCase(),
                    0, nOccurrence)+cBeginDelim.length-1;
        nPos2 = utils.stringPosition(cString.toLowerCase(), cEndDelim.toLowerCase(),
                    nPos1, 1)-1;
    }else{
        nPos1 = utils.stringPosition(cString, cBeginDelim, 0, nOccurrence)+
                    cBeginDelim.length-1;
        nPos2 = utils.stringPosition(cString, cEndDelim, nPos1, 1)-1;
    }
    if(nPos1 > -1 && nPos2 >-1){
        return cString.substring(nPos1, nPos2);
    }else{
        return "";
    }
}

// VFP2Servoy Toolkit
// Function : STRTOFILE()
// Author   : Omar van Galen
/**
* @param {String} cString - String to append
* @param {String} cFileName - File to which string is appended
*
*/
function STRTOFILE(cString, cFileName){
    return plugins.file.appendToTXTFile(cFileName, cString);
}

// VFP2Servoy Toolkit
// Function : STRTRAN()
// Author   : Omar van Galen
/**
* In a character string replace all occurences of the specified
* findstring with the specified replacement string
*
* @param {String} cExpression
* @param {String} cFindString
* @param {String} cReplacement
* @returns {String}
*/
function STRTRAN(cExpression, cFindString, cReplacement){
    return utils.stringReplace(cExpression, cFindString, cReplacement);
}

// VFP2Servoy Toolkit
// Function : STUFF()
// Author   : Omar van Galen
/**
* Returns a character string created by replacing a specified number of
* characters in a character expression with another character expression
*
* @param {String} cExpression
* @param {Number} nStartReplacement
* @param {Number} nCharactersReplaced
* @param {String} cReplacement
* @returns {String}
*/
function STUFF(cExpression, nStartReplacement, nCharactersReplaced, cReplacement){
    var cPart1 = cExpression.substring(0, nStartReplacement-1);
    var cPart2 = cExpression.substr(nStartReplacement-1+nCharactersReplaced);
    return cPart1 + cReplacement + cPart2;
}

// VFP2Servoy Toolkit
// Function : SUBSTR()
// Author   : Omar van Galen / Boudewijn Lutgerink
/**
* Returns a character string from the given character expression, starting at a
* specified position in the character expression continuing for a specified number of
* characters
*
* @param {String} cExpression - Specifies the character expression or memo field
*                               from which the character string is returned
* @param {Number} nStartPosition - Specifies the position in the character expression
*                                  from where the character string is returned
* @param {Number} nCharactersReturned - Specifies the number of characters to return
*                                       from cExpression
*/
function SUBSTR(cExpression, nStartPosition, nCharactersReturned){
    if(!nCharactersReturned){
        return cExpression.substr(nStartPosition-1)
    }else{
        return cExpression.substr(nStartPosition-1, nCharactersReturned)
    }
}

// VFP2Servoy Toolkit
// Function : SYS()
// Author   : Omar van Galen
/**
* Returns system information
*
* @param {Number} nFunction - specifies which sys() function to use
*/

function sys(nFunction){

    // SYS(0) - network machine information
    if(nFunction==0){
        return application.getHostName() + " # " + security.getSystemUserName();
    }

    // SYS(2) - seconds since midnight
    if(nFunction==2){
        var dDate = new Date();
        return (dDate.getHours()*60*60)+(dDate.getMinutes()*60)+dDate.getSeconds();
    }

    // SYS(3) - generate a tempfile name
    if(nFunction==3){
        return plugins.file.createTempFile("","")
    }

    // always return a value
    var uRetVal;
    return uRetVal;
}

// VFP2Servoy Toolkit
// Function : SYSMETRIC()
// Author   : Omar van Galen
/**
* Returns the screenwidht or height
*
* @param {Number} nScreenElement
* @return {Number}
*/
function SYSMETRIC(nScreenElement){
    if(nScreenElement==1){
        return application.getScreenWidth();
    }else{
        return application.getScreenHeight();
    }
}

// VFP2Servoy Toolkit
// Function : TIME()
// Author   : Omar van Galen
/**
* Returns the current system time in 24-hour, eight-character string (hh:mm:ss) format
*/
function TIME(){
    var dDate = new Date();
    return utils.stringLeft(dDate.toLocaleTimeString(), 8);
}

// VFP2Servoy Toolkit
// Function : TRANSFORM()
// Author   : Omar van Galen
/**
* Returns a character string from an expression
*
* @param {Object} eExpression
*/
function TRANSFORM(eExpression){
    var argumentType = typeof(arguments[0]);
    if(argumentType=="object" && arguments[0] instanceof Date > 0){
        argumentType = "datetime";
    }

    switch( argumentType ){
    case"object":
        if(eExpression == null){
            return "null";
        }else{
            return "(Object)" ;
        }

    case "number":
        return eExpression.toString() ;

    case "boolean":
        return eExpression.toString() ;

    case "string":
        return eExpression ;

    case "datetime":
        // support dates
        // return a short datestring in the users locale
        // first determine the default dateformat
        var defaultDateFormat = i18n.getDefaultDateFormat();
        // strip off the time mask and keep the date mask
        var firstSpacePos = defaultDateFormat.indexOf(" ");
        defaultDateFormat = utils.stringLeft(defaultDateFormat, firstSpacePos);
        // set century on
        if(defaultDateFormat.indexOf("yy")>=0 &&
                defaultDateFormat.indexOf("yyyy")==-1){
            defaultDateFormat = defaultDateFormat.replace("yy","yyyy");
        }
        return utils.dateFormat(eExpression, defaultDateFormat);
    }
}

// VFP2Servoy Toolkit
// Function : TYPE()
// Author   : Omar van Galen
/**
* Returns the data type of an expression (including date!)
*
* @param {Object} eVarNameNoQuotes
* @returns {String}
*/
function TYPE(eVarNameNoQuotes){
    if(typeof(eVarNameNoQuotes)=="object" && eVarNameNoQuotes instanceof Date) {
        return "date";
    }else{
        return typeof(eVarNameNoQuotes);
    }
}

// VFP2Servoy Toolkit
// Function : UPPER()
// Author   : Boudewijn Lutgerink
/**
* Returns the specified character expression in uppercase
*
* @param {String} cExpression - Specifies the character expression UPPER()
*                               converts to uppercase
*/
function UPPER(cExpression){
    return cExpression.toUpperCase();
}

// VFP2Servoy Toolkit
// Function : VAL()
// Author   : Omar van Galen
/**
* Returns a numeric value from a character expression composed of numbers
* @param {String} cExpression
*/
function VAL(cExpression){
    var strNum = utils.stringTrim(cExpression);
    var numResult = utils.stringToNumber(strNum);
    // catch bug: utils.StringToNumber does not respect negative numbers
    if (strNum.charAt(0)=="-") {
        numResult = numResult * -1;
    }
    return numResult;
}

// VFP2Servoy Toolkit
// Function : VARTYPE()
// Author   : Omar van Galen
/**
* Returns the data type of an expression (including date!)
*
* @param {Object} eVarNameNoQuotes
* @returns {String}
*/
function VARTYPE(eVarNameNoQuotes){
    if (typeof(eVarNameNoQuotes)=="object" && eVarNameNoQuotes instanceof Date) {
        return "date";
    }else{
        return typeof(eVarNameNoQuotes);
    }
}

// VFP2Servoy Toolkit
// Function : VERSION()
// Author   : Omar van Galen
/**
* Returns the application version
*
*/
function VERSION(){
    return application.getVersion();
}

// VFP2Servoy Toolkit
// Function : WEEK()
// Author   : Omar van Galen
/**
* Returns the week number for the date parameter dDate.
* It supports both ISO 8601 and USA/Canada week numbering.
* This function can be written shorter but I prefer to
* keep it readable and understandable
*
* @param {Date} dDate
* @param {Number} nOverruleFirstDayOfWeek (optional) - 0=Sunday 1=Monday
* @return {Number} number
*/
function WEEK(dDate, nOverruleFirstDayOfWeek) {
    // Remove time components of date
    var justTheDate=new Date(dDate.getFullYear(), dDate.getMonth(), dDate.getDate());
    var weekDiff=0;
    // determine if ISO 8601 (european) or Canada/USA calculation should be used
    if((!nOverruleFirstDayOfWeek && utils.isMondayFirstDayOfWeek()) ||
         nOverruleFirstDayOfWeek==1){
        // ISO 8601 (week 1 contains Jan 4th and first Thursday is in week 1)
        // Change date to Thursday same week
        var targetThursday = new Date(justTheDate.setDate(justTheDate.getDate() -
            ((justTheDate.getDay() + 6) % 7) + 3));
        // Take January 4th as it is always in week 1 (see ISO 8601)
        var targetJan4 = new Date(targetThursday.getFullYear(), 0, 4);
        // Change date to Thursday same week
        var firstThursday = new Date(targetJan4.setDate(targetJan4.getDate() -
            ((targetJan4.getDay() + 6) % 7) + 3));
        // Number of weeks between target Thursday and first Thursday
        weekDiff = (targetThursday - firstThursday) / (86400000*7);
    }else{
        // Canada/USA (week 1 contains Jan 1st and first Saturday is in week 1)
        // Change date to Saturday same week
        var targetSaturday = new Date(justTheDate.setDate(justTheDate.getDate() -
            ((justTheDate.getDay() + 6) % 7) + 5));
        // Take January 1st as it is always in week 1
        var targetJan1 = new Date(targetSaturday.getFullYear(), 0, 1);
        // Change date to Saturday same week
        var firstSaturday = new Date(targetJan1.setDate(targetJan1.getDate() -
            ((targetJan1.getDay() + 6) % 7) + 5));
        // Number of weeks between target Saturday and first Saturday
        weekDiff = (targetSaturday - firstSaturday) / (86400000*7);
    }
    // return the result
    return 1 + weekDiff;
}


