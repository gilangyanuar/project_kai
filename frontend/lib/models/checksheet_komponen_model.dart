class ChecksheetKomponenModel {
  String itemPemeriksaan;
  String standar;
  String hasilInput;
  String keterangan;

  Map<String, String> multiInput;

  ChecksheetKomponenModel({
    required this.itemPemeriksaan,
    required this.standar,
    this.hasilInput = '',
    this.keterangan = '',
    Map<String, String>? multiInput,
  }) : multiInput = multiInput ?? {};

  Map<String, dynamic> toJson() {
    return {
      'item_pemeriksaan': itemPemeriksaan,
      'standar': standar,
      'hasil_input': hasilInput,
      'keterangan': keterangan,
      'multi_input': multiInput,
    };
  }

  factory ChecksheetKomponenModel.fromJson(Map<String, dynamic> json) {
    return ChecksheetKomponenModel(
      itemPemeriksaan: json['item_pemeriksaan'] ?? '',
      standar: json['standar'] ?? '',
      hasilInput: json['hasil_input'] ?? '',
      keterangan: json['keterangan'] ?? '',
      multiInput: Map<String, String>.from(json['multi_input'] ?? {}),
    );
  }
}
