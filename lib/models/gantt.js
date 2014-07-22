'use strict';

var mongoose = require('mongoose'),
    Schema = mongoose.Schema;



var GanttChartSchema = new Schema({
    name: String
});


var GanttEntrySchema = new Schema({
    chart: String,
    label: String,
    start: Date,
    end: Date,
    info: String,
    color: {
        type: String,
        lowercase: true
    },
    done: {
        type: Number,
        max: 100
    }
});


/**
 * Save Schema
 */
mongoose.model('GanttEntry', GanttEntrySchema);
