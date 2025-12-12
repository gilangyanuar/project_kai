class ChecksheetGerbongFaseModel {
  String nomorGerbong;
  String faseBerangkat;
  String faseKembali;

  ChecksheetGerbongFaseModel({
    this.nomorGerbong = '',
    this.faseBerangkat = '',
    this.faseKembali = '',
  });

  bool get isValid {
    return nomorGerbong.isNotEmpty &&
        faseBerangkat.isNotEmpty &&
        faseKembali.isNotEmpty;
  }

  Map<String, dynamic> toJson() {
    return {
      'nomor_gerbong': nomorGerbong,
      'fase_berangkat': faseBerangkat,
      'fase_kembali': faseKembali,
    };
  }
}
